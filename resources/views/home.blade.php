@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div style="width: 100%; height: 120px; text-align:center; background-color: #FFFFFF;">
                <img src="{{ asset('img/body.jpg') }}" height="100%" align="center">
            </div>

            <ul class="list-group nav navbar-nav" style="text-align: center;">
                <a href="#"><li class="list-group-item active" style="padding: 20px;">服务器列表</li></a>
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
            <button type="button" class="btn btn-success"><span style="font-weight: 900; font-size:large;">+</span>&nbsp新增</button>
            <div style="float: right; margin: 10px 20px 10px 20px">
                <form role="form">
                    <div class="form-group">
                        <select class="form-control">
                            <option>踢足球</option>
                            <option>游泳</option>
                            <option>慢跑</option>
                            <option>跳舞</option>
                        </select>
                    </div>

                    <div class="form-group" style="float: right">
                        <select class="form-control">
                            <option>踢足球</option>
                            <option>游泳</option>
                            <option>慢跑</option>
                            <option>跳舞</option>
                        </select>
                    </div>
                </form>
            </div>
{{--

            <div style="float: right; margin: 10px 20px 10px 20px">
                <form role="form">
                    <div class="form-group">
                        <select class="form-control">
                            <option>踢足球</option>
                            <option>游泳</option>
                            <option>慢跑</option>
                            <option>跳舞</option>
                        </select>
                    </div>
                </form>
            </div>
--}}

            {{-- <div class="dropdown" style="margin: auto 30px 30px 30px; float: right">
                 <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:#C6FBFF; " >
                     币种
                     <span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li>eth</li>
                     <li>btc</li>
                     <li>usdt</li>
                     <li role="separator" class="divider"></li>
                 </ul>
             </div>--}}

 {{--           <div class="dropdown" style="margin: auto 30px 30px 30px; float: right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:#C6FBFF; " >
                    项目
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($item as $items)
                    <li>{{$items->item}}</li>
                    @endforeach
                    <li role="separator" class="divider"></li>
                </ul>
            </div>--}}

{{--
            <div class="dropdown" style="margin: auto 30px 30px 30px; float: right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:#C6FBFF; " >
                    种类
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li>币服务器</li>
                    <li>web服务器</li>
                    <li role="separator" class="divider"></li>
                </ul>
            </div>
--}}


            <table class="table table-hover">
                <thead style="background-color: #3490DC">
                    <tr>
                        <th>分类</th>
                        <th>项目</th>
                        <th>币种</th>
                        <th>角色</th>
                        <th>IP</th>
                        <th>内网IP</th>
                        <th>系统</th>
                        <th>状态</th>
                        <th>时间</th>
                        <th colspan="2" style="text-align: center">操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ip as $item)
                    <tr>
                        @if($item->categroy == 0)
                        <th>币服务器</th>
                        @else
                        <th>web服务器</th>
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
                        <td>{{$item->created_at}}</td>
                        <td><span class="glyphicon glyphicon-pencil"></span><a href="#"></a></td>
                        <td><a href="#">删除</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
