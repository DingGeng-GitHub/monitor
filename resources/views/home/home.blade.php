@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div style="width: 100%; height: 120px; text-align:center; background-color: #FFFFFF;">
                <img src="{{ asset('img/body.jpg') }}" height="100%" align="center">
            </div>

            <ul class="list-group nav navbar-nav" style="text-align: center;">
                <a href="/home"><li class="list-group-item active" style="padding: 20px;">服务器列表</li></a>
                <a href="#"><li class="list-group-item">Web服务器</li></a>
                <a href="#"><li class="list-group-item">币服务器</li></a>
                <a href="#"><li class="list-group-item">物理内存</li></a>
                <a href="#"><li class="list-group-item">运行内存</li></a>
                <a href="#"><li class="list-group-item">CPU状态</li></a>
                <a href="#"><li class="list-group-item">BTC</li></a>
                <a href="#"><li class="list-group-item">USDT</li></a>
                <a href="#"><li class="list-group-item">ETH</li></a>
            </ul>
        </div>

        <div class="col-md-10">
            <button type="button" class="btn btn-success"><a href="#"><span style="font-weight: 900; font-size:large;">+</span>&nbsp新增</a></button>
            <div style="float: right; margin: 10px 20px 10px 20px">
                <form role="form" action="/home" method="get">
                    <?php
                        $get_categroy = isset($_GET['categroy']) ? $_GET['categroy'] : '';
                    ?>
                    <div class="form-group" style="float: left; margin: 0 10px 0 10px">
                        <select class="form-control" name="categroy" id="categroy">
                            <option value=""></option>
                            <option value="币服务器" @if($get_categroy == '币服务器') selected @endif>币服务器</option>}
                            <option value="web服务器" @if($get_categroy == 'web服务器') selected @endif>web服务器</option>
                        </select>
                    </div>

                    <?php
                    $get_item = isset($_GET['item']) ? $_GET['item'] : '';
                    ?>
                    <div class="form-group" style="float: left; margin: 0 10px 0 10px">
                        <select class="form-control" name="item" id="item">
                                <option value=""></option>
                        @foreach($item as $items)
                                <option value="{{$items->item}}" @if($get_item == $items->item) selected @endif>{{$items->item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <?php
                    $get_currency = isset($_GET['currency']) ? $_GET['currency'] : '';
                    ?>
                    <div class="form-group" style="float: left; margin: 0 10px 0 10px">
                        <select class="form-control" name="currency" id="currency">
                            <option value=""></option>
                            @foreach($currency as $items)
                            <option value="{{$items->currency}}" @if($get_currency == $items->currency) selected @endif>{{$items->currency}}</option>
                            @endforeach
                        </select>
                    </div>

                    <?php
                    $get_system_type = isset($_GET['system_type']) ? $_GET['system_type'] : '';
                    ?>
                    <div class="form-group" style="float: left; margin: 0 30px 0 10px">
                        <select class="form-control" name="system_type" id="system_type">
                            <option></option>
                            @foreach($system_type as $items)
                                <option value="{{$items->system_type}}" @if($get_system_type == $items->system_type) selected @endif>{{$items->system_type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="float: left; margin: 5px 0 0 0">
                        <span class="input-group-addon" style="font-size: large; font-weight: 900;">
                            IP:
                        </span>
                    </div>

                    <div class="form-group" style="float: left; margin: 0 30px 0 10px">
                        <input type="text" value="" name="ip" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success" {{--onclick="query();"--}}>查询</button>
                </form>

            </div>
            <table class="table table-hover">
                <thead style="background-color: #3490DC">
                    <tr>
                        <th>序号</th>
                        <th>分类</th>
                        <th>项目</th>
                        <th>币种</th>
                        <th>角色</th>
                        <th>IP</th>
                        <th>内网IP</th>
                        <th>系统</th>
                        <th>状态</th>
                       {{-- <th>时间</th>--}}
                        <th colspan="2" style="text-align: center">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php $a = 0;  ?>
                @foreach($ip as $item)
                    <tr>
                        <th><?php $a++ ; echo $a; ?></th>
                        @if($item->categroy == 0)
                        <td>币服务器</td>
                        @else
                        <td>web服务器</td>
                        @endif
                        <td>{{$item->item}}</td>
                        <td>{{$item->currency}}</td>
                        <td>{{$item->role}}</td>
                        <td>{{$item->IP}}</td>
                        <td>{{$item->Intranet_ip}}</td>
                        <td>{{$item->system_type}}</td>
                        @if($item->status == 0)
                        <td><img src="{{ asset('img/ture.jpg') }}" height="25px" alt="#" class="img-rounded"></td>
                        @else
                        <td><img src="{{ asset('img/false.jpg') }}" height="25px" alt="#" class="img-rounded"></td>
                        @endif
                        {{--<td>{{$item->created_at}}</td>--}}
                        {{--<td><span class="glyphicon glyphicon-pencil"></span><a href="#"></a></td>--}}
                        <td style="width: 50px; text-align: center; font-size: small">
                            <button class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#addUserModal">
                                编辑
                            </button>
                        </td>
                        <td style="width: 50px; text-align: center; font-size: small">
                            <button class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#addUserModal">
                                删除
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $ip->links() }}
        </div>
    </div>
</div>

<!-- 模态框示例（Modal） -->
<form method="post" action="" class="form-horizontal" role="form" id="form_data" onsubmit="return check_form()" style="margin: 20px;">
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        用户信息
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="user_id" class="col-sm-3 control-label">用户ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="user_id" name="user_id" value="{user_id}"
                                       placeholder="请输入用户ID">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">用户名</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user_name" value="" id="user_name"
                                       placeholder="用户名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">地址</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" value="" id="address"
                                       placeholder="地址">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="remark" class="col-sm-3 control-label">备注</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control"  name="remark" value="{remark}" id="remark"
                                           placeholder="备注">

                                </textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button><span id="tip"> </span>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</form>
@endsection

{{--
<script type="text/javascript">
    function query() {
        var categroy = document.getElementById('categroy').value;
        var item = document.getElementById('item').value;
        var currency = document.getElementById('currency').value;
        var system_type = document.getElementById('system_type').value;

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/home',
            data:{
                categroy,item,currency,system_type
            },
            dataType: 'json',
            async : 'false',    //同步
            success: function(data){
                console.log(data);
                if(data.code==1){

                }else{

                }
            }
        });
    }
</script>
--}}
