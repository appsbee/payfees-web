<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="main-content">
    <div class="main-content-inner">
        <div class="widget-main seach_part breadcrumbs">
            <form class="form-search">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 no_mar">
                        <div class="input-group">

                            <input type="text" class="form-control search-query" placeholder="Type your query"/>
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-purple btn-sm">
                                                                        <span
                                                                            class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                                                        Search
                                                                    </button>
                                                                </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="page-content">


            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <table id="" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>

                            <th width="25%">School Name</th>
                            <th width="35%">School Address</th>
                            <th width="30%">Admin</th>
                            <th width="8%">&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td rowspan="3">Jawahar High School</td>
                            <td rowspan="3">Rishi Tech Park, 700156</td>
                            <td>Rakesh Sharma<br>
                                985959582822</td>
                            <td rowspan="3">
                                <a href="<?php echo site_url("admin/school-management/edit");?>">
                                <button class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </button>
                                </a>
                                <button class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Rakesh Sharma<br>
                                985959582822</td>
                        </tr>

                        <tr>
                            <td>Rakesh Sharma<br />
                                985959582822</td>
                        </tr>
                        <tr>
                            <td rowspan="3">Jawahar High School</td>
                            <td rowspan="3">Rishi Tech Park, 700156</td>
                            <td>Rakesh Sharma<br>
                                985959582822</td>
                            <td rowspan="3"><button class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </button>
                                <button class="btn btn-xs btn-danger">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Rakesh Sharma<br>
                                985959582822</td>
                        </tr>

                        <tr>
                            <td>Rakesh Sharma<br />
                                985959582822</td>
                        </tr>




                        </tbody>
                    </table>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<div class="clearfix"></div>
</div>

