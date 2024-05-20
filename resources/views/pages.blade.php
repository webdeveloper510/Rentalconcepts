  @extends('layout.main')
  @section('main-content')
  <div class="container mt-5">
      <div class="row mts-5">
          <div class="col-lg-7 mx-auto">
              <div class="container">

                  <form class="create-page-form" role="form">
                      <div class=" text-center">
                          <h1 class=" mt-3">Create Page</h1>
                      </div>
                      <div class="controls">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="pagetitle">Page Title</label>
                                      <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter page title " autocomplete="off" required="required" data-error="Page Title is required.">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="location"> Add Location</label>
                                      <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your location">
                                          <option value="" selected disabled>--Select Your Location--</option>
                                          <option class="form-control">location1</option>
                                          <option class="form-control">location2</option>
                                          <option class="form-control">location3</option>
                                          <option class="form-control">location4</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="role">Access By Role</label>
                                      <select class="form-control">
                                          <option class="form-control">Super admin</option>
                                          <option class="form-control">Manager</option>
                                          <option class="form-control">Owner </option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row mt-5 ">
                          <div class="col-md-12">
                              <input type="submit" class="btn btn-secondary pt-2 btn-block btn-send" value="Create">
                          </div>
                      </div>
              </div>
              </form>
          </div>
      </div>
  </div>
  </div>
  </div>
  @endsection