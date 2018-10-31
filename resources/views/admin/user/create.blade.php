@extends('admin.clone_index.clone')

@section('content')
	<!-- 显示验证错误信息 -->
	@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

	<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-magic"></i>{{ $title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        
        <form class="mws-form wizard-form wizard-form-horizontal" id="mws-wizard-form" action="/admin/user" method='post'>
            {{ csrf_field()}}
            <fieldset class="mws-form-inline" id="step-1" style="display: block;" data-wzd-id="wzd_1cr022tv31sejegk82h_0">
                <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i> Member Profile</legend>
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名 <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <input name='username' class="required large" type="text" value='{{ old("username")}}'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">密码 <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <input name="password" class="required email large" type="password">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码 <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <input name="repassword" class="required email large" type="password">
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">邮箱<span class="required">*</span></label>
                    <div class="mws-form-item">
                        <input name="email" class="required email large" type="text" value='{{ old("email")}}'>
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">手机号码 <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <input name="phone" class="required email large" type="text" value='{{ old("phone")}}'>
                    </div>
                </div>
                 
                <div class="mws-form-row">
                    <label class="mws-form-label">管理权限 <span class="required">*</span></label>
                     <select name='status'>
                           		<option value='1'>管理员</option>
                           		<option value='2'>普通用户</option>
                           </select>
                    <div class="mws-form-item">
                       
                        <label class="error plain" style="display:none" for="gender" generated="true"></label>
                    </div>
                </div>
             
            </fieldset>
            
            <fieldset class="mws-form-inline" id="step-2" style="display: none;" data-wzd-id="wzd_1cr022tv31sejegk82h_1">
                <legend class="wizard-label" style="display: none;"><i class="icol-delivery"></i> Membership Type</legend>
                <div class="mws-form-row">
                    <label class="mws-form-label">Membership Plan <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <select class="required large">
                        	<option>Free</option>
                        	<option>Standard</option>
                        	<option>Premium</option>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">Subscription Period <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <select class="required large">
                        	<option>One Month</option>
                        	<option>Six Months</option>
                        	<option>Twelve Months</option>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">Payment Method <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <ul class="mws-form-list">
                            <li><input name="pm" class="required" id="cc" type="radio"> <label for="cc">Credit Card</label></li>
                            <li><input name="pm" id="pp" type="radio"> <label for="pp">PayPal</label></li>
                        </ul>
                        <label class="error plain" style="display:none" for="pm" generated="true"></label>
                    </div>
                </div>
            </fieldset>
            
        
        <div class="mws-button-row">
        	<input type="submit" class='btn btn-info' value="提交">
        </div>
    </form>
    </div>
</div>

@endsection