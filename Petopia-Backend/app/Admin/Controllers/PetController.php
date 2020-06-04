<?php

namespace App\Admin\Controllers;

use App\Pet;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PetController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pet';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Pet());

        $grid->column('id', __('Id'));
        $grid->column('user.name',__('Pet Owner'),);
        $grid->column('name', __('Name'));
        $grid->column('species', __('Species'));
        $grid->column('gender', __('Gender'));
        $grid->column('breed', __('Breed'));
        $grid->column('color', __('Color'));
        $grid->column('age', __('Age'));
        $grid->column('weight', __('Weight'));
        $grid->column('neutered', __('Neutered'));
        $grid->column('previous_problems', __('Previous problems'));
        $grid->column('drug_allergies', __('Drug allergies'));
        $grid->column('current_diet', __('Current diet'));
        $grid->column('current_medication', __('Current medication'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Pet::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user.name',__('Pet Owner'),);
        $show->field('name', __('Name'));
        $show->field('species', __('Species'));
        $show->field('gender', __('Gender'));
        $show->field('breed', __('Breed'));
        $show->field('color', __('Color'));
        $show->field('age', __('Age'));
        $show->field('weight', __('Weight'));
        $show->field('neutered', __('Neutered'));
        $show->field('previous_problems', __('Previous problems'));
        $show->field('drug_allergies', __('Drug allergies'));
        $show->field('current_diet', __('Current diet'));
        $show->field('current_medication', __('Current medication'));
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
        $form = new Form(new Pet());

        $form->select('user_id',__('User'))->options(User::all()->pluck('name','id'))->rules('required');
        $form->text('name', __('Name'))->rules('required|min:3');
        $form->radio('species')->options(['dog' => 'Dog', 'cat'=> 'Cat'])->default('dog'); 
        $form->radio('gender')->options(['male' => 'Male', 'female'=> 'Female'])->default('male'); 
        $form->text('breed', __('Breed'))->rules('required|regex:"(?=.*[A-Za-z])"');
        $form->text('color', __('Color'))->rules('required|regex:"(?=.*[A-Za-z])"');
        $form->number('age', __('Age'));
        $form->decimal('weight', __('Weight'))->rules('required|min:1|max:2');
        $form->radio('neutered')->options(['yes' => 'Yes', 'no'=> 'No'])->default('no'); 
        $form->textarea('previous_problems', __('Previous problems'))->rules('nullable');
        $form->textarea('drug_allergies', __('Drug allergies'))->rules('nullable');
        $form->textarea('current_diet', __('Current diet'));
        $form->textarea('current_medication', __('Current medication'))->rules('nullable');

        return $form;
    }
    // public function store($request)
    // {    
    //     // dd(request());
    //     // Pet::store([
    //     //     'name' => request()->street_name,
    //     //     'species' => request()->species ? true:false ,
    //     //     'breed' => request()->breed,
    //     //     'birthdate'=> request()->birthdate,
    //     //     'color'=> request()->color,
    //     //     'neutered'=> request()->neutered ? true:false,
    //     //     'previous_problems'=> request()->color,
    //     //     'drug_allergies'=> request()->color,
    //     //     'current_diet'=> request()->color,
    //     //     'current_medication'=> request()->color,
    //     // ]);
    //     Pet::create($request->all());

    //     return response()->json([
    //         'success'=>true, 
    //         'message'=>'hello from laravel', 
    //         'data'=>'mydata'
    //     ]);
    // }

}
