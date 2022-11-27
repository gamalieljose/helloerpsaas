@extends('layouts.app')

@section('template_title')
    Bank Account
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bank Account') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bank-accounts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Business Id</th>
										<th>Holder Name</th>
										<th>Bank Name</th>
										<th>Account Number</th>
										<th>Opening Balance</th>
										<th>Contact Number</th>
										<th>Bank Address</th>
										<th>Created By</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bankAccounts as $bankAccount)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bankAccount->business_id }}</td>
											<td>{{ $bankAccount->holder_name }}</td>
											<td>{{ $bankAccount->bank_name }}</td>
											<td>{{ $bankAccount->account_number }}</td>
											<td>{{ $bankAccount->opening_balance }}</td>
											<td>{{ $bankAccount->contact_number }}</td>
											<td>{{ $bankAccount->bank_address }}</td>
											<td>{{ $bankAccount->created_by }}</td>

                                            <td>
                                                <form action="{{ route('bank-accounts.destroy',$bankAccount->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bank-accounts.show',$bankAccount->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bank-accounts.edit',$bankAccount->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bankAccounts->links() !!}
            </div>
        </div>
    </div>
@endsection
