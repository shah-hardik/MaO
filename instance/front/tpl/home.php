<?php $selected = "home"; ?>

<div class="row-fluid sortable">

    <div class="span12">
        <div id="box_responsive_one"><!-- jQuery add span here -->
            <div class="box">
                <div class="box-title">
                    <h3>
                        <i class="icon-reorder"></i>
                        Basic Info
                    </h3>
                    <div class="actions" style="display:done">
                        <a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
                        <a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>
                        <a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
                    </div>
                </div>
                <div class="box-content nopadding">
                    <div class="tabs-container">
                        <ul class="tabs tabs-inline tabs-left">
                            <li class="active">
                                <a data-toggle="tab" href="#first"><i class="icon-info"></i> <span>Real time notification</span></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#second"><i class="icon-bell"></i> <span>Notices and warnings</span></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#thirds"><i class="icon-dollar"></i> <span>Billing and support</span></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#forth"><i class="icon-facetime-video"></i> <span>Help Videos</span></a>
                            </li>
							<li>
                                <a data-toggle="tab" href="#fifth"><i class="icon-edit"></i> <span>Upcoming Upgrades</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content padding tab-content-inline slimScrollDiv">
					<div id="fifth" class="tab-pane">
						Next Upgrade on Nov 1, 2013
						<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					</div>
                        <div id="first" class="tab-pane active">
                            <b style="font-size:26px;font-weight:bold;color:#FFA500;font-family:'Life Savers'">Welcome to MaO! </b>
							
							<br /><Br />
							We are glad you joined our family. Our products are focused on a simple vision. 
							
							<br /><br />
							
							<div style="border:1px dashed #EEE;padding:7px">
							Offering easy to use applications that focus on helping you sell, manage, promote, and succeed! Not just the app, but also supporting you. 
							</div>
							
							<br />
							We hope you truly enjoy the benefits of MaO and stay tuned for more to come. We would love to hear your suggestions, feedback, and even feature request you would like to see implemented. 
							
							
							<br /><br />
							Thank you again & welcome!
                        </div>
                        <div id="second" class="tab-pane">
						<div class="alert alert-error">
        <strong>Warning!</strong> &nbsp;&nbsp;sells may increase dramatically by using MaO. Please be prepared to stay busy :) 
    </div>
                            
                        </div>
                        <div id="thirds" class="tab-pane">
                            Have A Questions ? (877) 583-1187

                        </div>

                        <div id="forth" class="tab-pane">
                            Lorem ipsum Officia quis sint sit sit tempor proident est enim exercitation nostrud do pariatur.<br/>
                            <iframe width="450" height="300" src="//www.youtube.com/embed/jB5KFJULahs" frameborder="0" allowfullscreen></iframe>
                            Lorem ipsum Officia quis sint sit sit tempor proident est enim exercitation nostrud do pariatur.<br/>
                            <iframe width="450" height="300" src="//www.youtube.com/embed/jB5KFJULahs" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php /*
          <div id="box_responsive_two"> <!-- jQuery add span here -->
          <div class="box">
          <div class="box-title">
          <h3><i class="icon-question-sign"></i>F.A.Q's</h3>
          <div class="actions">
          <a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
          <a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
          <a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
          </div>
          </div>
          <div class="box-content nopadding scrollable" data-height="350" data-visible="true" data-start="bottom">
          <ul class="messages">
          <li class="left">
          <div class="image">
          <i class="icon-key"></i>
          </div>
          <div class="message">
          <span class="caret"></span>
          <span class="name">What is API key?</span>
          <p>Lorem ipsum aute ut ullamco et nisi ad. </p>
          <span class="time">
          12 minutes ago
          </span>
          </div>
          </li>
          <li class="right">
          <div class="image">
          <i class="icon-thumbs-up"></i>
          </div>
          <div class="message">
          <span class="caret"></span>
          <span class="name">What is best way to use MAO?</span>
          <p>Lorem ipsum aute ut ullamco et nisi ad. Lorem ipsum adipisicing nisi Excepteur eiusmod ex culpa laboris. Lorem ipsum est ut...</p>
          <span class="time">
          12 minutes ago
          </span>
          </div>
          </li>
          <li class="left">
          <div class="image">
          <i class="icon-picture"></i>
          </div>
          <div class="message">
          <span class="caret"></span>
          <span class="name">Can I use images for my Button?</span>
          <p>Lorem ipsum aute ut ullamco et nisi ad. Lorem ipsum adipisicing nisi!</p>
          <span class="time">
          12 minutes ago
          </span>
          </div>
          </li>
          <li class="right">
          <div class="image">
          <i class="icon-ticket"></i>
          </div>
          <div class="message">
          <span class="caret"></span>
          <span class="name">Can I submit ticket for my special request?</span>
          <p>Please use <a href="http://support.harrisonconcepts.com/">http://support.harrisonconcepts.com/</a> for your request</p>
          <span class="time">
          12 minutes ago
          </span>
          </div>
          </li>
          <li class="left">
          <div class="image">
          <i class="icon-picture"></i>
          </div>
          <div class="message">
          <span class="caret"></span>
          <span class="name">Can I use images for my Button?</span>
          <p>Lorem ipsum aute ut ullamco et nisi ad. Lorem ipsum adipisicing nisi!</p>
          <span class="time">
          12 minutes ago
          </span>
          </div>
          </li>
          <li class="typing">
          <span class="name">John Doe</span> is typing question<i class="icon-keyboard"></i>
          </li>
          <li class="insert">
          <form id="message-form" method="POST" action="#">
          <div class="text">
          <input type="text" name="text" placeholder="Write here..." class="input-block-level">
          </div>
          <div class="submit">
          <button type="submit"><i class="icon-share-alt"></i></button>
          </div>
          </form>
          </li>
          </ul>
          </div>
          </div>
          </div>

         */ ?>

        <div id="box_responsive_two"> <!-- jQuery add span here -->
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-question-sign"></i>Offer Statistics</h3>
                    <div class="actions" style="display:none">
                        <a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
                        <a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
                        <a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
                    </div>
                </div>
                <div class="box-content nopadding scrollable" data-height="350" data-visible="true" data-start="bottom">
                      <div id="chart_div" style="width: 90%; height: 300px;"></div>
                </div>
            </div>
        </div>

    </div>

</div>
