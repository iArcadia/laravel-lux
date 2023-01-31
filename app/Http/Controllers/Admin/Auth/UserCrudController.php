<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\Auth\UserCrudRequest;
use App\Models\Auth\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use function config;

/**
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserCrudController extends CrudController {
    use Operations\ListOperation,
        Operations\CreateOperation,
        Operations\UpdateOperation,
        Operations\DeleteOperation,
        Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void {
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
        CRUD::setValidation(UserCrudRequest::class);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void {
        CRUD::column('id')->type('number');

        CRUD::column('name')->type('text');
        CRUD::column('email')->type('email');
        CRUD::column('email_verified_at')->type('datetime');

        CRUD::column('created_at')->type('datetime');
        CRUD::column('updated_at')->type('datetime');
    }

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    protected function setupShowOperation(): void {
        $this->autoSetupShowOperation();
    }

    /**
     * Define what commonly happens for the Create and Update operation.
     *
     * @return void
     */
    protected function setupCommonCreateAndUpdateOperation(): void {
        CRUD::field('name')->type('text');
        CRUD::field('email')->type('email');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void {
        $this->setupCommonCreateAndUpdateOperation();

        CRUD::field('password')->type('password');
        CRUD::field('password_confirmation')->type('password');

        User::creating(function (User $user) {
            $user->password = Hash::make($user->password);
            $user->email_verified_at = new Carbon;
        });
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void {
        $this->setupCommonCreateAndUpdateOperation();

        CRUD::field('email_verified_at')->type('datetime');
    }
}
