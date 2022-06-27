@extends('layouts.main')
 
@section('style')
 
@endsection

@section('title', 'To Do List')
 
 
@section('content')
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <div class="container"  style="margin-bottom:20px !important">
                            <div class="row">
                              <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> 
                              </div>
                              <div class="col-md-2 col-sm-6 ">
                                <button class="add btn btn-primary font-weight-bold todo-list-add-btn" onclick="add()">Add</button>
                              </div>
                              <div class="col-md-2 col-sm-6">
                                <select id="type">
                                    <option value="opel" >all</option>
                                    <option value="volvo">incomplete</option>
                                    <option value="saab" onclick="filter('complete')" >complete</option>
                                  </select>
                              </div>
                            </div>
                          </div>

    
                    
                        
                        <div class="list-wrapper">
                            <ul class="todo-list list-group" id="todo-list">
                           
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script src="{{ asset('js/tasks.js') }}"></script>
@endsection