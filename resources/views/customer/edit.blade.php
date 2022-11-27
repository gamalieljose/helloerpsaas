<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('CustomerController@update', [$customer->id]), 'method' => 'PUT', 'id' => 'customer_edit_form' ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'lang_v1.customer_group_name' )</h4>
    </div>

    <div class="modal-body">
    <h6 class="sub-title">{{__('Basic Info')}}</h6>


    <div class="row">


        <div class="form-group">
        {!! Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*') !!}
        {!! Form::text('name', $customer->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]); !!}
        </div>


        <div class="form-group">
        {!! Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*') !!}
        {!! Form::text('contact', $customer->contact, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]); !!}
        </div>

        <div class="form-group">
        {!! Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*') !!}
        {!! Form::text('email', $customer->email, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]); !!}
        </div>
        
        <div class="form-group">
        {!! Form::label('balance', __( 'lang_v1.customer_group_name' ) . ':*') !!}
        {!! Form::text('balance', $customer->balance, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]); !!}
        </div>
    </div>




 
      
    </div>









    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.update' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->