<html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/panel.css')}}">	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
<div class="container">
	<div class="row">
		    <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Panel 1</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                </div>
                <div class="panel-body">

                	<div class="row">
                		 <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Last Name2</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                </div>
                	</div>

                    <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Last Name2</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                </div>

                 <div class="col-md-2">
                    <div class="form-group">
                        <label for="lastname" class="control-label">Last Name2</label>
                        <input type="number" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                </div>

                    </div>
                     <div class="row">
             <div class="col-xs-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
                   </div>
            </div>
        </div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('js/panel.js')}}"></script>
</body>
</html>