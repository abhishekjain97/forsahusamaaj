@extends('layouts.admin_master')
@section('sitetitle', 'All Members')
@section('title', 'All Members')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Mobile</th>
                                    <th>Email Id</th>
                                    <th>Country/State/City</th>
                                    <th>Address</th>
                                    <th>Highest Education</th>
                                    <th>Date Of Birth</th>
                                    <th>Blood Group</th>
                                    <th>Marriage Anniversary</th>
                                    <th>Profile Photo</th>
                                    <th>Current Address</th>
                                    <th>Permanent Address</th>
                                    <th>Occupation Type</th>
                                    <th>Profession</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($members as $member)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>
                                        <select name="status" id="status" onchange="updateStatus(this.value)">
                                            <option value="1/{{$member->id}}" <?php if($member->status == 1){ echo 'selected'; } ?>>Active</option>
                                            <option value="0/{{$member->id}}" <?php if($member->status == 0){ echo 'selected'; } ?>>De-Active</option>
                                        </select>
                                    </td>
                                    <td>
                                        <form action="{{ route('deletemember', $member->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                    <td>{{ $member->name}}</td>
                                    <td>{{ $member->father_name }}</td>
                                    <td>{{ $member->mobile }}</td>
                                    <td>{{ $member->email_id }}</td>
                                    <td>{{ $member->country->name }}/{{ $member->state->name }}/{{ $member->city->city }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>{{ $member->highest_education }}</td>
                                    <td>{{ date("d M, Y", strtotime($member->dob)) }}</td>
                                    <td>{{ $member->blood_group }}</td>
                                    <td>{{ date("d M, Y", strtotime($member->marriage_anniversary)) }}</td>
                                    <td><a href="{{ asset('uploads/member_directory/' . $member->profile_photo) }}" target="_blank"><img src="{{ asset('uploads/member_directory/' . $member->profile_photo) }}" style="width: 100px;"></a></td>
                                    <td>{{ $member->current_address }}</td>
                                    <td>{{ $member->permanent_address }}</td>
                                    <td>{{ $member->occupation_type }}</td>
                                    <td>{{ $member->profession }}</td>
                                    
                                </tr>
                                @php
                                $sr++;
                                @endphp
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<script>
    function updateStatus(status) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{ url("admin/updatememberstatus") }}',
            type: "POST",
            data: {
                status: status
            },
            // dataType: 'json',
            success: function(result) {
                if(result == "success") {
                    alert('Status updated successfully');
                }
                else {
                    alert('Status not updated');
                }
            }
        });
    }
</script>


@endsection