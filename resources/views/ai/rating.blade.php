@extends('layouts.app')
@section('css')

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
<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" href='#add-modal'>+Add New</button>

<br><br>
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
<div class="modal" id="add-modal">
  <div class="modal-dialog" style="max-width: 700px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="add-form" action="{{asset('/rates')}}" method="POST" >
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Demeanor</label>
            <select class="form-control form-control-sm" name="demeanor" id="demeanor">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Responsiveness</label>
            <select class="form-control form-control-sm" name="responsiveness" id="responsiveness">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Competence</label>
            <select class="form-control form-control-sm" name="competence" id="competence">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Completeness</label>
            <select class="form-control form-control-sm" name="completeness" id="completeness">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Tangible</label>
            <select class="form-control form-control-sm" name="tangible" id="tangible">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Relevancy</label>
            <select class="form-control form-control-sm" name="relevancy" id="relevancy">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Accuracy</label>
            <select class="form-control form-control-sm" name="accuracy" id="accuracy">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Currency</label>
            <select class="form-control form-control-sm" name="currency" id="currency">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Training Provider</label>
            <select class="form-control form-control-sm" name="training_provider" id="training_provider">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">User Understanding</label>
            <select class="form-control form-control-sm" name="user_understanding" id="user_understanding">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Participation</label>
            <select class="form-control form-control-sm" name="participation" id="participation">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Easier to the Job</label>
            <select class="form-control form-control-sm" name="easier_to_the_job" id="easier_to_the_job">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Increase Productivity</label>
            <select class="form-control form-control-sm" name="increase_productivity" id="increase_productivity">
              <option value="5">Very Satisfied</option>
              <option value="4">Satisfied</option>
              <option value="3">Medium</option>
              <option value="2">Unsatisfied</option>
              <option value="1">Extremely Dissatisfied</option>
            </select>
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
<script src="{{ asset('js/main/rating.js') }}"></script>

@endsection