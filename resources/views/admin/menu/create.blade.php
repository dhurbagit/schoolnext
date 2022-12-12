@extends('admin.layout.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Menu</h4>
                    <a href="{{route('menu.view')}}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                <form id="frmEdit" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Page Title</label>
                                <input type="text" class="form-control" name="page_title">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about_image_wrapper">
                                <img src="" alt="" id="placeholder_image">
                            </div>
                            <div class="form-group">
                                <label>Main Image:</label>
                                <input type="file" name="image" accept="image/*" class="form-control"
                                    onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about_image_wrapper">
                                <img src="" alt="" id="placeholder_image1">
                            </div>
                            <div class="form-group">
                                <label>Banner Image:</label>
                                <input type="file" name="banner_image" accept="image/*" class="form-control"
                                    onchange="loadFile1(event)">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Category</label>
                                <select class="form-control select" name="menu_category">
                                    <option value="">--Select a category--</option>
                                    @foreach ($menu_categories as $category)
                                        <option value="{{ $category }}">{{ ucwords($category) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Main or Child Menu</label>
                                <select class="form-control select main_child" name="main_child">
                                    <option>-- Select --</option>
                                    <option value="0">Main Menu</option>
                                    <option value="1">Chlid Menu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6" id="parent" style="display: none;">
                            <div class="form-group">
                                <label>Under Main Menu:</label>
                                <select class="form-control select" name="parent_id">
                                    <option value="">--Select a Parent Menu--</option>
                                    @foreach ($parent_menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6" id="header_footer" style="display: none;">
                            <div class="form-group">
                                <label>Show In</label>
                                <select class="form-control select" name="show_in">
                                    <option value="">--Select where to show--</option>
                                    <option value="1" selected>Header</option>
                                    <option value="2">Footer</option>
                                    <option value="3">Header and Footer</option>
                                    <option value="4">Mega Menu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                        name="active_mega">
                                    <label class="custom-control-label" for="customSwitch3">Active as Mega menu</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch4"
                                        name="publish_status">
                                    <label class="custom-control-label" for="customSwitch4">Hide/Show</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="editor1"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-success">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
@push('scripts')
<script>
    $(function() {
        $('.main_child').change(function() {
            var main_child = $(this).children("option:selected").val();
            if (main_child == 1)
            {
                document.getElementById("parent").style.display = "block";
                document.getElementById("header_footer").style.display = "none";
            }
            else if(main_child == 0)
            {
                document.getElementById("parent").style.display = "none";
                document.getElementById("header_footer").style.display = "block";
            }
        })
    });
</script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile1 = function(event) {
            var image = document.getElementById('placeholder_image1');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endpush
