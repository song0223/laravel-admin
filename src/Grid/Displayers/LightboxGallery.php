<?php

namespace Encore\Admin\Grid\Displayers;

class LightboxGallery extends Lightbox
{
    /**
     * {@inheritdoc}
     */
    protected $options = [
        'type'    => 'image',
        'gallery' => [
            'enabled'            => true,
            'preload'            => [0, 2],
            'navigateByImgClick' => true,
            'arrowMarkup'        => '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            'tPrev'              => 'Previous (Left arrow key)',
            'tNext'              => 'Next (Right arrow key)',
            'tCounter'           => '<span class="mfp-counter">%curr% of %total%</span>',
        ],
    ];
}
