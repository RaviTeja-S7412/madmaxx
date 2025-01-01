<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Theatres</h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/theatres">Theatres</a> </li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create Theatre</a> </li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title text-white">Create Theatre</h4>
                </div>
                <div class="card-body">

                    <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/solutions/edit" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $sul->id ?>">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <input type="text" class="form-control" name="theatre_name" value="<?php echo $sul->theatre_name ?>" id="input3" required>
                                    <span class="bar"></span>
                                    <label for="input3">Theatre Name</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <input type="text" class="form-control" name="theatre_location" value="<?php echo $sul->theatre_location ?>" id="input3" required>
                                    <span class="bar"></span>
                                    <label for="input3">Theatre Location</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <input type="time" class="form-control" name="theatre_start_time" value="<?php echo $sul->theatre_start_time ?>" id="input3" required>
                                    <span class="bar"></span>
                                    <label for="input3">Theatre Start Time</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <input type="time" class="form-control" name="theatre_end_time" value="<?php echo $sul->theatre_end_time ?>" id="input3" required>
                                    <span class="bar"></span>
                                    <label for="input3">Theatre End Time</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <input type="number" class="form-control" name="max_people" value="<?php echo $sul->max_people ?>" id="input3" required>
                                    <span class="bar"></span>
                                    <label for="input3">Max People For Theatre</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <input type="number" class="form-control" name="theatre_price" value="<?php echo $sul->theatre_price ?>" id="input3" required>
                                    <span class="bar"></span>
                                    <label for="input3">Theatre Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <input type="number" class="form-control" name="additional_price" value="<?php echo $sul->additional_price ?>" id="input3" required>
                                    <span class="bar"></span>
                                    <label for="input3">Additional Price Per Person</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                    <label>Decoration Included</label>
                                    <select class="form-control p-0 decoration_included" name="decoration_included" required>
                                        <option value="yes" <?php if ($sul->alignment == 'yes') { ?> selected="selected" <?php } ?>>Yes</option>
                                        <option value="no" <?php if ($sul->alignment == 'no') { ?> selected="selected" <?php } ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 add_decor_price">
                                <div class="form-group mb-5">
                                    <input type="number" class="form-control" name="additional_decoration_price" value="<?php echo $sul->additional_decoration_price ?>" id="input3">
                                    <span class="bar"></span>
                                    <label for="input3">Additional Decoration Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span for="">Food Menu</span>
                                <div class="form-group mb-5 ">
                                    <input type="file" class="form-control" name="food_menu" id="input2" accept="pdf" required multiple>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span for="">Theatre Images</span>
                                <div class="form-group mb-5 ">
                                    <input type="file" class="form-control" name="theatre_images" id="input2" required multiple>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-5 ">
                                    <span for="">Theatre Video</span>
                                    <input type="file" class="form-control p-0" name="theatre_videos" id="input2" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group float-left">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!----tables---->


<?php admin_footer(); ?>

</form>
</div>
</div>
</div>
</div>
</div>

<!----tables---->

<?php admin_footer(); ?>

<script>
    $(".decoration_included").change(function() {
        var val = $(this).val();
        if (val == "no") {
            $(".add_decor_price").hide();
        } else {
            $(".add_decor_price").show();
        }
    })
</script>