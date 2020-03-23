@extends('admin.layouts.master')

@section('content')

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Summernote</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add new Skills</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">	
                <div class="card m-b-30">
                    <div class="card-body">
                        <form action="#" id="add_new_skill">
                        	@csrf
                            <div class="form-group">
                                <label>Skill name:</label>
                                <input type="text" name="skill_name" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Lavel:</label>
                                <select name="lavel" class="form-control">
                                    <option value="">---Select lavel---</option>
                                    <option value="Basic">Basic</option>
                                    <option value="Advance">Advance</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" name="description" rows="6"></textarea>
                            </div>

                        
                            <div class="form-group m-b-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
<script type="text/javascript">
    $( "#add_new_skill" ).validate({
        rules: {
            skill_name:{
                required: true,
            },
            description:{
                required: true, 
            },
            lavel:{
                required: true,  
            }
        },
        submitHandler: function(form){
            var form_data = $(form).serializeArray();
            $.ajax({
                type: "POST",
                url: base_url + '/skill',
                data: form_data,
                success: response => {
                    if (response.status == 'T') {
                        alert(response.message);location.reload();
                    } else {
                        alert(response.message);location.reload();
                    }
                },
                error: response => {
                    debugger ;
                }
            });
        }
    });
</script>

@endsection