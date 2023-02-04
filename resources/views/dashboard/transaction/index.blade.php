@extends('layout.dashboard.index')
@section('dashboardcontent')
<div class="content-wrapper">
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    {{$title}}
                </h4>
                <div class="table-responsive mt-2">
                    <table class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>
                                    Transaction
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Items
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $t)
                            <tr>
                                <td>{{"$t->document_code - $t->document_number"}}</td>
                                <td>{{$t->user->name}}</td>
                                <td>{{currencyIDR($t->total)}}</td>
                                <td>{{parseTanggal($t->created_at)}}</td>
                                <td>
                                    @php
                                    $items = $t->hasDetails($t->document_code, $t->document_number)
                                    @endphp
                                    @foreach ($items as $i)
                                    {{"$i->product_name x $i->quantity"}} <br>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- content-wrapper ends -->
@endsection