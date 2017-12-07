@extends('Admin.head')

<!--
 * 后台用户修改页
 * @author [苏波] <386249656@qq.com>
 * @data 2017-11-27 20:10
 * 
  -->
  
@section('content')

        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">



            <div class="row-content am-cf" >



            
                <div class="row" >

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                                <div class="row">
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                                    <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 用户编辑: <small>users</small></div>
                                    <p class="page-header-description">编辑后台用户</p>
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                            @if(is_object($errors))
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            @else
                                                <li style="color:red">{{ $errors }}</li>
                                            @endif
                                            </ul>
                                        </div>
                                    @endif
                                            
                                </div>

                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <form action="{{url('/admin/users/'.$data->uid)}}" method="post" enctype="multipart/form-data" class="am-form tpl-form-border-form tpl-form-border-br">
                                    {{method_field('put')}}
                                    {{csrf_field()}}
                                    <div class="am-form-group">

                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户名 : <span  class="tpl-form-line-small-title"></span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="uname" value="{{$data->uname}}" class="tpl-form-input" id="user-name" placeholder="请输入用户名">
                                            <small></small>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    

                                  

                                    <br>
                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit"  class="am-btn am-btn-primary tpl-btn-bg-color-success ">确认更改</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                


            </div>
        </div>

@stop