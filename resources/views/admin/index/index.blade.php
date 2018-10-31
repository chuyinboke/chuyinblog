@extends('admin.clone_index.clone')
@section('content')
   <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-magic"></i>欢迎来到初音小博客的后台</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                      
                            <fieldset class="mws-form-inline" id="step-1" style="display: block;" data-wzd-id="wzd_1cr022tv31sejegk82h_0">
                             
                               
                               
                                <div class="mws-form-row">
                                    <label class="mws-form-label"><span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <textarea name="address" class="required large" style="width:700px;height:300px">
                                            

                                            简介：  初音的小博客是一款多人聊天系统
                                        </textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label"><span class="required">*</span></label>
                                   
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
                            
                            <fieldset class="mws-form-inline" id="step-3" style="display: none;" data-wzd-id="wzd_1cr022tv31sejegk82h_2">
                                <legend class="wizard-label" style="display: none;"><i class="icol-user"></i> Confirmation</legend>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Message <span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <textarea name="address" class="required large" rows="2" cols="20"></textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Subscribe Newsletter <span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list inline">
                                            <li><input name="sn" class="required" id="sn_yes" type="radio"> <label for="sn_yes">Yes</label></li>
                                            <li><input name="sn" id="sn_no" type="radio"> <label for="sn_no">No</label></li>
                                        </ul>
                                        <label class="error plain" style="display:none" for="sn" generated="true"></label>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">I agree to the TOS <span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list inline">
                                            <li><input name="tos" class="required" id="tos_y" type="checkbox"> <label for="tos_y">Yes</label></li>
                                        </ul>
                                        <label class="error plain" style="display:none" for="tos" generated="true"></label>
                                    </div>
                                </div>
                   </form>
                    </div>
                </div>

   

 @endsection