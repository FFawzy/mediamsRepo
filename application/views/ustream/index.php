<style>
/* image thumbnail */
.thumb {
    display: block;
	width: 100%;
	margin: 0;
}

/* Style to article Author */
.by-author {
	font-style: italic;
	line-height: 1.3;
	color: #aab6aa;
}

/* Main Article [Module]
-------------------------------------
* Featured Article Thumbnail
* have a image and a text title.
*/
.featured-article {
	width: 482px;
	height: 350px;
	position: relative;
	margin-bottom: 1em;
}

.featured-article .block-title {
	/* Position & Box Model */
	position: absolute;
	bottom: 0;
	left: 0;
	z-index: 1;
	/* background */
	background: rgba(0,0,0,0.7);
	/* Width/Height */
	padding: .5em;
	width: 100%;
	/* Text color */
	color: #fff;
}

.featured-article .block-title h2 {
	margin: 0;
}

/* Featured Articles List [BS3]
--------------------------------------------
* show the last 3 articles post
*/

.main-list {
	padding-left: .5em;
}

.main-list .media {
	padding-bottom: 1.1em;
	border-bottom: 1px solid #e8e8e8;
  margin-bottom: 5%;
}
</style>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        All
                        <small>Users</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
                        <li class="active">All Users</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                  <div class="container">
                      <div class="row">
                      <h1><?php echo $channelName;?></h1>
                      <p>if channel is live you will be able to see it here otherwise offline videos are listed</p>
                      </div>
                      <div class="row">
                      <div class="col-md-5 col-lg-5">
                        <!-- artigo em destaque -->
                        <div class="featured-article">
                          <iframe src="<?php echo $liveLink;?>" style="border: 0 none transparent;"  webkitallowfullscreen allowfullscreen frameborder="no" width="482" height="350"></iframe>

                          <!-- <div class="block-title">
                            <h2>Lorem ipsum dolor asit amet</h2>
                            <p class="by-author"><small>By Jhon Doe</small></p>
                          </div> -->
                        </div>
                        <!-- /.featured-article -->
                      </div>
                      <div class="col-md-7 col-lg-7">
                        <ul class="media-list main-list">

                          <?php
                              foreach ($videos->videos as $video) {
                                echo '<li class="media">
                                  <a class="pull-left" href="'.$video->url.'">
                                    <img class="media-object" src="'.$video->thumbnail->default.'" alt="...">
                                  </a>
                                  <div class="media-body">
                                    <h4 class="media-heading">'.$video->title.'</h4>
                                    <h6 class="media-heading">'.$video->description.'</h6>
                                    <p class="by-author">By '.$video->owner->username.'</p>
                                  </div>
                                </li>';
                              }

                           ?>

                        </ul>
                      </div>
                      </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">

                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form id="addUser" role="form" method="POST" action="<?php echo base_url();?>User/add">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="JDoe">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label >User Type</label>
                                    <select class="form-control" id="type" name="type">
                                      <option value="reporter">Reporter</option>
                                      <option value="admin">Admin</option>
                                    </select>
                                </div>

                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addUser" class="btn btn-primary">Add User</button>
              </div>
            </div>
          </div>
        </div>
