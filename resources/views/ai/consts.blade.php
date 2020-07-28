@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">

<style type="text/css" media="screen">
  #name-error{
    color: #5a5c69;
    font-size: 0.8rem;
    position: relative;
    line-height: 1;
    color: red
  }
  .error{
    color: #5a5c69;
    font-size: 1rem;
    position: relative;
    line-height: 1;
    color: red;
    width: 100%;
  }
  .image-product{
    width: 200px;
    height: auto;
  }
  .sorting{
    font-size: 10px;
  }
  td{
    font-size: 10px;
  }
</style>
@endsection
@section('content')
<table class="table table-bordered" id="users-table">
  <thead>
    <tr>
      <th>Demeanor</th>
      <th>Responsiveness</th>
      <th>Competence</th>
      <th>Tangible</th>
      <th>Completeness</th>
      <th>Relevancy</th>
      <th>Accuracy</th>
      <th>Currency</th>
      <th>Training Provider</th>
      <th>User Understanding</th>
      <th>Participation</th>
      <th>Easier to the Job</th>
      <th>Increase Productivity</th>
      <th>Action</th>
    </tr>
  </thead>
</table>


<!-- The Modal -->
<div class="modal" id="edit-modal">
  <div class="modal-dialog" style="max-width: 700px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="add-form" action="{{asset('/consts')}}" method="POST" >
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Demeanor</label>
            <input type="number" class="form-control form-control-sm" name="demeanor" id="demeanor" />
          </div>
          <div class="form-group">
            <label for="name">Responsiveness</label>
            <input type="number" class="form-control form-control-sm" name="responsiveness" id="responsiveness" />
          </div>
          <div class="form-group">
            <label for="name">Competence</label>
            <input type="number" class="form-control form-control-sm" name="competence" id="competence" />
          </div>
          <div class="form-group">
            <label for="name">Completeness</label>
            <input type="number" class="form-control form-control-sm" name="completeness" id="completeness" />
          </div>
          <div class="form-group">
            <label for="name">Tangible</label>
            <input type="number" class="form-control form-control-sm" name="tangible" id="tangible" />
          </div>
          <div class="form-group">
            <label for="name">Relevancy</label>
            <input type="number" class="form-control form-control-sm" name="relevancy" id="relevancy" />
          </div>
          <div class="form-group">
            <label for="name">Accuracy</label>
            <input type="number" class="form-control form-control-sm" name="accuracy" id="accuracy" />
          </div>
          <div class="form-group">
            <label for="name">Currency</label>
            <input type="number" class="form-control form-control-sm" name="currency" id="currency" />
          </div>
          <div class="form-group">
            <label for="name">Training Provider</label>
            <input type="number" class="form-control form-control-sm" name="training_provider" id="training_provider" />
          </div>
          <div class="form-group">
            <label for="name">User Understanding</label>
            <input type="number" class="form-control form-control-sm" name="user_understanding" id="user_understanding" />
          </div>
          <div class="form-group">
            <label for="name">Participation</label>
            <input type="number" class="form-control form-control-sm" name="participation" id="participation" />
          </div>
          <div class="form-group">
            <label for="name">Easier to the Job</label>
            <input type="number" class="form-control form-control-sm" name="easier_to_the_job" id="easier_to_the_job" />
          </div>
          <div class="form-group">
            <label for="name">Increase Productivity</label>
            <input type="number" class="form-control form-control-sm" name="increase_productivity" id="increase_productivity" />
          </div>
          


        </div>
        <input type="hidden" name="id" id="eid">

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection

@section('js')
<script src="{{ asset('js/main/consts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js"></script>
<script src="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.js"></script>

@endsection