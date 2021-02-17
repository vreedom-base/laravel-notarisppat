<?php

namespace App\Admin\Controllers;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use App\Models\Client;
use App\Models\Indonesian\Province;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Table;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ClientController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Client';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Client);

        $table->column('id', 'ID');
        $table->column('name', __('name'));
        $table->column('created_at', trans('admin.created_at'));
        $table->column('updated_at', trans('admin.updated_at'));

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
        $show = new Show(Client::query()->findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', 'name');
        $show->field('created_at', trans('admin.created_at'));
        $show->field('updated_at', trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Client);

        // dd(Gender::LakiLaki());
        $gender = [
            Gender::LakiLaki()->value   => Gender::LakiLaki()->description,
            Gender::Perempuan()->value  => Gender::Perempuan()->description,
        ];

        $marital_statuses = [
            MaritalStatus::BelumKawin()->value  => MaritalStatus::BelumKawin()->description,
            MaritalStatus::Kawin()->value       => MaritalStatus::Kawin()->description,
            MaritalStatus::CeraiHidup()->value  => MaritalStatus::CeraiHidup()->description,
            MaritalStatus::CeraiMati()->value   => MaritalStatus::CeraiMati()->description,
        ];

        $blood_types = ['A', 'B', 'AB', 'O'];

        $form->display('id', 'ID');

        $form->text('nik', "NIK")->inputmask(["mask" => 9, "repeat" => 16]);
        $form->text('name', "Nama");
        $form->select('gender', 'Jenis Kelamin')->options($gender);
        $form->text('birth_place', "Tempat Lahir");
        $form->date('birth_date', "Tanggal Lahir");
        $form->text('occupation', "Pekerjaan")->icon('fa-briefcase');
        $form->text('latest_education', "Pendidikan Terakhir")->icon('fa-school');
        $form->text('religion', "Agama");
        $form->select('marital_status', "Status Perkawinan")->options($marital_statuses);
        $form->select('blood_type', "Golongan Darah")->options($blood_types);
        $form->text('postal_code', "Kode Pos")->inputmask(["mask" => 99999])->icon('fa-map-pin');
        $form->textarea('address', "Alamat");
        $form->text('rtrw', 'RT/RW')->inputmask(["mask" => "999/999"]);
        $form->text('location_address', "Lokasi");
        $form->select('provinces', 'Provinsi')->options(function ($id) {
            return Province::options($id);
        })->ajax('/admin/api/v1/indonesian/provinces');
        $form->hidden('extras');

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        if ($form->isCreating())
            $form->tools(function (Form\Tools $tools) {
                $tools->disableDelete();
                // $tools->disableView();
                // $tools->disableList();
            });
        
        $form->ignore(['rtrw', 'location_address', 'provinces']);
        $form->saving(function (Form $form) {
            $form->extras = json_encode($form->rtrw);
            // dump(request()->all());
            // dump($form->rtrw);
        });

        return $form;
    }
}
