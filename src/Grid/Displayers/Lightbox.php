<?php

namespace Encore\Admin\Grid\Displayers;

use Encore\Admin\Admin;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class Lightbox extends AbstractDisplayer
{
    /**
     * Magnific Popup options.
     *
     * @var array
     */
    protected $options = [
        'type' => 'image',
    ];

    /**
     * Whether the magnific-popup assets are already queued.
     *
     * @var bool
     */
    protected static $assetsQueued = false;

    protected function script()
    {
        $options = json_encode($this->options);

        return <<<SCRIPT
$('.grid-popup-link').magnificPopup($options);
SCRIPT;
    }

    protected function addAssets()
    {
        if (static::$assetsQueued) {
            return;
        }

        Admin::css('vendor/laravel-admin/magnific-popup/magnific-popup.css');
        Admin::js('vendor/laravel-admin/magnific-popup/jquery.magnific-popup.min.js');

        static::$assetsQueued = true;
    }

    /**
     * Add a zoom animation effect.
     *
     * @return void
     */
    public function zooming()
    {
        $this->options = array_merge($this->options, [
            'mainClass' => 'mfp-with-zoom',
            'zoom'      => [
                'enabled'  => true,
                'duration' => 300,
                'easing'   => 'ease-in-out',
            ],
        ]);
    }

    public function display(array $options = [])
    {
        if (empty($this->value)) {
            return '';
        }

        if ($this->value instanceof Arrayable) {
            $this->value = $this->value->toArray();
        }

        $server = Arr::get($options, 'server');
        $width = Arr::get($options, 'width', 200);
        $height = Arr::get($options, 'height', 200);
        $class = Arr::get($options, 'class', 'thumbnail');
        $class = collect((array) $class)->map(function ($item) {
            return 'img-'.$item;
        })->implode(' ');

        if (Arr::get($options, 'zooming')) {
            $this->zooming();
        }

        $this->addAssets();

        Admin::script($this->script());

        return collect((array) $this->value)->filter()->map(function ($path) use ($server, $width, $height, $class) {
            if (url()->isValidUrl($path) || strpos($path, 'data:image') === 0) {
                $src = $path;
            } elseif ($server) {
                $src = rtrim($server, '/').'/'.ltrim($path, '/');
            } else {
                $src = Storage::disk(config('admin.upload.disk'))->url($path);
            }

            // escape before embedding: the value comes from the DB, a crafted
            // path could otherwise break out of the attribute
            $src = e($src);

            return <<<HTML
<a href="{$src}" class="grid-popup-link">
    <img src='{$src}' style='max-width:{$width}px;max-height:{$height}px' class='img {$class}' />
</a>
HTML;
        })->implode('&nbsp;');
    }
}
