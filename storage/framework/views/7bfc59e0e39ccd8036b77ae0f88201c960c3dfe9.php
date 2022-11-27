

<?php $__env->startSection('title', __('essentials::lang.reminders')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_essentials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
					<div class="box-body">
						<div class="row">
					    	<div class="col-md-12">
								<div class="box-tools pull-right">
										<button data-href="#" class="btn btn-sm btn-primary add_reminder">
											<i class="fa fa-plus"></i>
											 <?php echo app('translator')->getFromJson('essentials::lang.add_reminder'); ?>
										</button>
								</div>
							</div>
						</div>
						<div id="calendar">
							
						</div>
					</div>
			</div>
		</div>
	</div>
	<?php echo $__env->make('essentials::reminder.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<!-- show reminder modal -->
<div class="modal fade view_reminder" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<?php
    $fullcalendar_lang_file = session()->get('user.language', config('app.locale') ) . '.js';
?>
<!-- TODO -->
<?php if(file_exists(public_path() . '/plugins/fullcalendar/locale/' . $fullcalendar_lang_file)): ?>
    <!-- <script src="<?php echo e(asset('plugins/fullcalendar/locale/' . $fullcalendar_lang_file . '?v=' . $asset_v), false); ?>"></script> -->
<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function(){

		//on button click show modal
		$('button.add_reminder').click( function(){
            $('div.reminder').modal('show');
        });

		//call function when modal opened
		$(".reminder").on('shown.bs.modal', function(){
			//reminder_form validate
			reminder_form_validator = $("form#reminder_form").validate();

			//date-picker
			$('form#reminder_form .datepicker').datepicker({
	                autoclose: true,
	                format:datepicker_date_format,
	        });

	    	//time
			$('form#reminder_form input#time').datetimepicker({
					format: moment_time_format,
	                ignoreReadonly: true,
	        });

	        $('form#reminder_form input#end_time').datetimepicker({
					format: moment_time_format,
	                ignoreReadonly: true,
	        });
		});

		//on hide reset reminder_form
		$('.reminder').on('hidden.bs.modal', function(){
			reminder_form_validator.destroy();
			$("form#reminder_form")[0].reset();
		});

		//saving reminder
		$(document).on("submit", "form#reminder_form", function(e){
			e.preventDefault();
			var data = $("form#reminder_form").serialize();
			var url = $("form#reminder_form").attr("action");
			$.ajax({
				method: "POST",
				url: url,
				data: data,
				dataType: "json",
				success: function(result){
					if(result.success == true){
						$('.reminder').modal("hide");
						reload_calendar();
						toastr.success(result.msg);
					} else {
						toastr.error(result.msg);
					}
				}
			});
		});

		//full calender
		clickCount = 0;
		$("#calendar").fullCalendar({
			header:{
				left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
			},
			eventLimit: true,
			events: '/essentials/reminder',
			// timeFormat: 'h(:mm)t', // like '7p'
			eventRender:function(event, element){
				var eventname_html = event.name;
				element.find('.fc-title').html(eventname_html);
				element.attr('data-href', event.url);
				element.attr('data-container', '.view_reminder');
				element.addClass('btn-modal');
			},
			dayClick: function(date, jsEvent, view){
				clickCount++;
				if(clickCount == 2){
					$('.reminder').modal("show");
				}
				var clickTimer = setInterval(function(){
                        clickCount = 0;
                        clearInterval(clickTimer);
                }, 500);
			}
		});

		//reload_calendar
		function reload_calendar()
		{
			$('#calendar').fullCalendar( 'refetchEvents' );
		}

		//on click show reminder
		$(document).on('click', '.btn-modal', function(){
		});

		//call function when modal opened
		$(".view_reminder").on('shown.bs.modal', function(){
			$("form#update_reminder_repeat").validate();
		});

		//delete reminder
		$(document).on('click', '#delete_reminder', function(){
			var url = $(this).data("href");
			swal({
		      title: LANG.sure,
		      icon: "warning",
		      buttons: true,
		      dangerMode: true,
		    }).then((confirmed) => {
		        if (confirmed) {
		        	$.ajax({
		        		method: "DELETE",
		        		url: url,
		        		dataType: "json",
		        		success: function(result){
		        			if(result.success == true){
		        				$('.view_reminder').modal('hide');
		        				reload_calendar();
		        				toastr.success(result.msg);
		        			} else {
		        				toastr.error(result.msg);
		        			}
		        		}
		        	});
		        }
		    });
		});

		//update reminder_repeat
		$(document).on('submit', 'form#update_reminder_repeat', function(e){
			e.preventDefault();
			var url = $("form#update_reminder_repeat").attr("action");
			var data = $("form#update_reminder_repeat").serialize();
			$.ajax({
				method: "PUT",
				url: url,
				data: data,
				dataType: "json",
				success: function(result){
					if(result.success == true){
        				$('.view_reminder').modal('hide');
        				reload_calendar();
        				toastr.success(result.msg);
        			} else {
        				toastr.error(result.msg);
        			}
				}
			});
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/pos1/Modules/Essentials/Providers/../Resources/views/reminder/index.blade.php ENDPATH**/ ?>