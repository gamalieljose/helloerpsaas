@extends('layouts.app')

@section('template_title')
    {{ $bankAccount->name ?? 'Show Bank Account' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Bank Account</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bank-accounts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Business Id:</strong>
                            {{ $bankAccount->business_id }}
                        </div>
                        <div class="form-group">
                            <strong>Holder Name:</strong>
                            {{ $bankAccount->holder_name }}
                        </div>
                        <div class="form-group">
                            <strong>Bank Name:</strong>
                            {{ $bankAccount->bank_name }}
                        </div>
                        <div class="form-group">
                            <strong>Account Number:</strong>
                            {{ $bankAccount->account_number }}
                        </div>
                        <div class="form-group">
                            <strong>Opening Balance:</strong>
                            {{ $bankAccount->opening_balance }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Number:</strong>
                            {{ $bankAccount->contact_number }}
                        </div>
                        <div class="form-group">
                            <strong>Bank Address:</strong>
                            {{ $bankAccount->bank_address }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $bankAccount->created_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
