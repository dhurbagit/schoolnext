@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Menu</h5>
                    <a href="{{route('menu.view')}}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                <form id="frmEdit" action="{{ route('menu.update', $edit_menu->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><b>Menu Name</b></label>
                                <input type="text" class="form-control" name="name" value="{{ $edit_menu->name }}">
                            </div>
                            <div class="form-group">
                                <label><b>Page Title</b></label>
                                <input type="text" class="form-control" name="page_title"
                                    value="{{ $edit_menu->page_title }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><b>Main Image</b></label>
                                <input type="file" name="image" accept="image/*" class="form-control"
                                    onchange="loadFile(event)">
                            </div>
                            <div class="form-group">
                                <label><b>Banner Image</b></label>
                                <input type="file" name="banner_image" accept="image/*" class="form-control"
                                    onchange="loadFile1(event)">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="flex-box">
                                <div class="content_box_wrapper">
                                    <label><b>Main Image</b></label>
                                    <div class="display_images">
                                        <img src="{{ asset('uploads/' . $edit_menu->image) }}" alt=""
                                    id="placeholder_image">
                                    </div>
                                </div>
                                <div class="content_box_wrapper">
                                    <label><b>Banner Image</b></label>
                                    <div class="display_images">
                                        <img src="{{ asset('uploads/' . $edit_menu->banner_image) }}" alt=""
                                    id="placeholder_image1">
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><b>Menu Category</b></label>
                                <select class="form-control js-example-basic-single select2" name="menu_category">

                                    @foreach ($menu_categories as $category)
                                        <option value="{{ $category }}"
                                            {{ $category == $edit_menu->category_slug ? 'selected' : '' }}>
                                            {{ ucwords($category) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><b>Main or Child Menu</b></label>
                                <select class="form-control js-example-basic-single select2 main_child" name="main_child">
                                    <option value="0" {{ $edit_menu->main_child == 0 ? 'selected' : '' }}>Main Menu
                                    </option>
                                    <option value="1" {{ $edit_menu->main_child == 1 ? 'selected' : '' }}>Chlid Menu
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group" id="parent">
                                <label><b>Under Main Menu</b></label>
                                <select class="form-control js-example-basic-single select2" name="parent_id">
                                    <option value="">--Select a Parent Menu--</option>
                                    @foreach ($parent_menus as $menu)
                                        <option value="{{ $menu->id }}"
                                            {{ $edit_menu->parent_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="header_footer" style="display: none">
                                <label><b>Show In</b></label>
                                <select class="form-control js-example-basic-single select2" name="show_in">
                                    <option value="">--Select where to show--</option>
                                    <option value="1" {{ $edit_menu->header_footer == 1 ? 'selected' : '' }}>Header
                                    </option>
                                    <option value="2" {{ $edit_menu->header_footer == 2 ? 'selected' : '' }}>Quick LInk
                                    </option>
                                    <option value="3" {{ $edit_menu->header_footer == 3 ? 'selected' : '' }}>Header
                                        and Quick LInk</option>
                                    <option value="4" {{ $edit_menu->header_footer == 4 ? 'selected' : '' }}>Mega Menu</option>
                                    <option value="5" {{ $edit_menu->header_footer == 5 ? 'selected' : '' }}>Top Ribbon</option>
                                    <option value="6" {{ $edit_menu->header_footer == 6 ? 'selected' : '' }}>Feature Link</option>
                                    <option value="7" {{ $edit_menu->header_footer == 7 ? 'selected' : '' }}>Header and Feature</option>
                                    <option value="8" {{ $edit_menu->header_footer == 8 ? 'selected' : '' }}>Quick LInk and Ribbon</option>
                                    <option value="9" {{ $edit_menu->header_footer == 9 ? 'selected' : '' }}>Feature and Ribbon</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" @if ($edit_menu->publish_status == 1) checked @endif
                                    class="custom-control-input" id="customSwitch3" name="publish_status">
                                <label class="custom-control-label" for="customSwitch3"><b>Hide/Show</b></label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mt-3">
                                <label><b>Description</b></label>
                                <textarea class="editor" name="editor1">{{ $edit_menu->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-success">Update</button>
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
                if (main_child == 1) {
                    document.getElementById("parent").style.display = "block";
                    document.getElementById("header_footer").style.display = "none";
                } else if (main_child == 0) {
                    document.getElementById("parent").style.display = "none";
                    document.getElementById("header_footer").style.display = "block";
                }
            })
        });
    </script>
    <script>
        $(window).ready(function() {

            var main_child = $('.main_child').children("option:selected").val();

            if (main_child == 1) {
                document.getElementById("parent").style.display = "block";
                document.getElementById("header_footer").style.display = "none";
            } else if (main_child == 0) {
                document.getElementById("parent").style.display = "none";
                document.getElementById("header_footer").style.display = "block";
            }
        })
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
