<?php

namespace App\Admin\Policies;

use App\Admin\User;
use App\Model\YyUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class YyUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the yyuser.
     *
     * @param  \App\Admin\User  $user
     * @param  \App\Model\Yyuser  $yyuser
     * @return mixed
     */
    public function view(User $user, YyUser $yyuser)
    {
        //
    }

    /**
     * Determine whether the user can create yyusers.
     *
     * @param  \App\Admin\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the yyuser.
     *
     * @param  \App\Admin\User  $user
     * @param  \App\Model\Yyuser  $yyuser
     * @return mixed
     */
    public function update(User $user, Yyuser $yyuser)
    {
        //
    }

    /**
     * Determine whether the user can delete the yyuser.
     *
     * @param  \App\Admin\User  $user
     * @param  \App\Model\Yyuser  $yyuser
     * @return mixed
     */
    public function delete(User $user, Yyuser $yyuser)
    {
        //
    }
}
