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

                                <input type="text" class="form-control search-query" placeholder="Type your query" />
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-purple btn-sm">
                                                                            <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                                                            Search
                                                                        </button>
																	</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                    <div class="ace-settings-box clearfix" id="ace-settings-box">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside
                                    <b>.container</b>
                                </label>
                            </div>
                        </div><!-- /.pull-left -->

                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container -->



                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row top_frm">
                            <div class="col-lg-4">
                                <select id="form-field-select-1" class="form-control">
                                    <option value="">Class</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>

                                </select>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" placeholder="Section" class="" id="form-field-1">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" placeholder="Section" class="" id="form-field-2">
                            </div>
                        </div>
                        <div class="row top_frm">
                            <div class="col-lg-6">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Upload Students</h4>

                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>


                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="file" id="id-input-file-2" />
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Upload New Students</h4>

                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>

                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="file" id="id-input-file-5" />
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">jQuery dataTables</h3>

                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <div class="table-header">
                                    Results for "Latest Registered Domains"
                                </div>

                                <!-- div.table-responsive -->

                                <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </th>
                                            <th>Name</th>
                                            <th>Registration</th>
                                            <th>Class/Section</th>

                                            <th>Roll</th>
                                            <th>Parents Name</th>

                                            <th>Phone</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#">Arunabha Chanda</a>
                                            </td>
                                            <td>21548632</td>
                                            <td>5/c</td>
                                            <td>42</td>

                                            <td>
                                                Fther & Mother
                                            </td>

                                            <td>
                                                0123456789
                                            </td>
                                        </tr>




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- PAGE CONTENT ENDS -->

                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->
        <div class="clearfix"></div>
    </div>

