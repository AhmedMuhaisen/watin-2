@extends('app')
@section('title', 'Dashboard page')
@section('contint')

<div id="content">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if(session('msg'))
        <div class="alert alert-{{@session('type')}} alert-dismissible fade show p-3" role="alert">
            <div class="text-right">{{ session('msg') }}</div>
            <button type="button" class="close p-3" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
    @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
             @can('Employee.create', Auth::user())
            <a href="{{ route('admin.employee.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">إضافة موظف جديد</a>
             @endcan
        </div>
        <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary  text-right ">إدارة الموظفين</h6>
            @if($page=='trash')
            <a href="{{route('admin.employee.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-trash"></i>  عرض الموظفين </a>
            @else
            <a href="{{route('admin.employee.trash')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-trash-alt"></i>   سلة المحذوفات  </a>
            @endif

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  text-right" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>الإسم</th>
                            <th>الإيميل</th>
                            <th>توثيق الإيميل</th>
                            <th>الصلاحية</th>
                            <th>المطعم</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                   @foreach ($employee as $item)


                        <tr>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->email}}</td>
                            <td>@if($item->email_verified_at)موثق
                                @else غير موثق @endif</td>
                            <td>@if($item->type==1)أدمن
                                @else موظف @endif</td>
                                <td>{{$item->restaurant->name}}</td>

                            <td>
                                @include('employee.'.$page.'_craid')

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


        <!-- End of Main Content -->

@endsection
            <!-- Main Content -->
