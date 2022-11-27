<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('business_id') }}
            {{ Form::text('business_id', $bankAccount->business_id, ['class' => 'form-control' . ($errors->has('business_id') ? ' is-invalid' : ''), 'placeholder' => 'Business Id']) }}
            {!! $errors->first('business_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('holder_name') }}
            {{ Form::text('holder_name', $bankAccount->holder_name, ['class' => 'form-control' . ($errors->has('holder_name') ? ' is-invalid' : ''), 'placeholder' => 'Holder Name']) }}
            {!! $errors->first('holder_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bank_name') }}
            {{ Form::text('bank_name', $bankAccount->bank_name, ['class' => 'form-control' . ($errors->has('bank_name') ? ' is-invalid' : ''), 'placeholder' => 'Bank Name']) }}
            {!! $errors->first('bank_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('account_number') }}
            {{ Form::text('account_number', $bankAccount->account_number, ['class' => 'form-control' . ($errors->has('account_number') ? ' is-invalid' : ''), 'placeholder' => 'Account Number']) }}
            {!! $errors->first('account_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('opening_balance') }}
            {{ Form::text('opening_balance', $bankAccount->opening_balance, ['class' => 'form-control' . ($errors->has('opening_balance') ? ' is-invalid' : ''), 'placeholder' => 'Opening Balance']) }}
            {!! $errors->first('opening_balance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_number') }}
            {{ Form::text('contact_number', $bankAccount->contact_number, ['class' => 'form-control' . ($errors->has('contact_number') ? ' is-invalid' : ''), 'placeholder' => 'Contact Number']) }}
            {!! $errors->first('contact_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bank_address') }}
            {{ Form::text('bank_address', $bankAccount->bank_address, ['class' => 'form-control' . ($errors->has('bank_address') ? ' is-invalid' : ''), 'placeholder' => 'Bank Address']) }}
            {!! $errors->first('bank_address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $bankAccount->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>