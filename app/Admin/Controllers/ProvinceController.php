<?php

namespace App\Admin\Controllers;

use App\Models\Indonesian\Province;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class ProvinceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Province';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Province());

        $table->column('id', __('Id'));
        $table->column('code', __('Code'));
        $table->column('name', __('Name'));
        $table->column('atrbpn_code', __('Atrbpn code'));
        $table->column('atrbpn_hashed_code', __('Atrbpn hashed code'));
        $table->column('postal_codes', __('Postal codes'));
        $table->column('created_at', __('Created at'));
        $table->column('updated_at', __('Updated at'));

        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Province::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('name', __('Name'));
        $show->field('atrbpn_code', __('Atrbpn code'));
        $show->field('atrbpn_hashed_code', __('Atrbpn hashed code'));
        $show->field('postal_codes', __('Postal codes'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Province());

        $form->number('code', __('Code'));
        $form->text('name', __('Name'));
        $form->number('atrbpn_code', __('Atrbpn code'));
        $form->text('atrbpn_hashed_code', __('Atrbpn hashed code'));
        $form->text('postal_codes', __('Postal codes'));

        return $form;
    }
}
