<?php
include('connectdb.php');
$userId = rand(1, 100);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">-->
	<title>Ticket Support | Help Desk</title>
	<link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/flat/zebra_dialog.min.css" type="text/css">
	<style>
		.pagination {

			padding: 8px;
		}

		.mobi-page {
			padding: 4px 10px;
			border: 1px solid #eee;
			display: flex;
			align-items: center;
			background-color: #fff;
		}

		.pagination li {
			background-color: #fff;
		}

		.container {
			padding-top: 30px;
		}

		.text-content {
			color: #6f7c87;
			font-size: 14px;

		}

		.ticket-list {
			border-radius: 2px;
			background-color: #fff;
			box-shadow: 0 1px 0 0 #cfd7df;
			display: table;
			width: 100%;
			box-sizing: border-box;
			margin-bottom: 10px;
		}

		.ticket-title {
			display: block;
			text-decoration: none !important;
			font-size: 16px;
			color: #000;
			font-weight: 700;
		}

		.ticket-tittle:hover {

			color: #2c5cc5;
			font-weight: 700;
		}

		.ticket-text-info {
			display: flex;
			margin-top: 10px;
			justify-content: center;
			align-items: center;
		}

		.ticket-wrap {
			display: flex;
			align-items: center;
			height: 100%;
		}

		.ticket-checkbox {
			margin: auto 0;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.checkbox {
			margin-right: 10px;
		}

		.dot {
			margin: 0 5px;
		}

		.ticket-left-item {
			margin: 5px 0;
			border: none;
		}

		.ticket-left-item:focus-visible {
			border: none;
			outline: none;
		}

		.text-content-left {
			margin-left: 15px;
		}

		.ticket-header {
			margin: 0 15px;
			height: 70px;
			background-color: #F5F7F9;
			border-bottom: 1px #cfd7df solid;
			border-left: 1px #cfd7df solid;
			border-right: 1px #cfd7df solid;
			box-shadow: 0 2px 4px 0 rgb(24 50 71 / 8%);
			margin-bottom: 15px;
		}

		.page-action-left {
			display: flex;
			justify-content: flex-start;
			align-items: center;
		}

		.page-action-right {
			display: flex;
			justify-content: flex-end;
			align-items: center;
		}

		.ticket-checkall {
			display: flex;
			padding: 8px 0;
		}

		.ticket-checkall input {
			display: flex;
			margin: auto 0;
			margin-right: 10px;
		}

		.sort-wrap {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.dropdown {
			margin: 8px;
		}

		.filter-box {
			position: absolute;
			top: 70px !important;
			right: 0;
			display: none;
		}

		.filter-box-show {
			display: block;
		}

		.filter-form-items {
			padding: 12px;
		}

		.form-control {
			font-size: 14px;
		}

		.filter-form-submit button {
			width: 100%;
		}

		.filter-form-header {
			font-size: 16px;
			font-weight: 700;
			margin-left: 12px;
			margin-top: 20px;
		}

		.popup_info {
			margin-right: 10px;
		}

		.popup_header {
			background-color: #007bff;
			padding: 5px;
			margin-top: -15px;
			margin-left: -12px;
			margin-right: -12px;
			color: #fff;
		}

		.popup_text {
			margin: 0;
		}

		.close {
			margin-top: -30px;
			color: #fff;
		}

		.form-info-popup {
			position: fixed;
			right: 22px;
			bottom: 50px;
			min-width: 400px;
			background-color: #fff;
			padding: 12px;
			border: 1px solid #eee;
			box-shadow: 0px 8px 10px rgb(0 0 0 / 15%);
			display: none;
		}

		.form-info-popup-show {
			display: block;
		}

		.form-group label {
			font-weight: 400;
		}

		.form-popup {
			padding: 15px 10px;
			margin: 0;
		}

		.popup-form-submit {
			text-align: center;
		}

		.ticket-username {
			position: relative;
		}

		.ticket-username:hover .contact-card-wrapper {
			display: flex;
		}

		.contact-card-wrapper {
			position: absolute;
			top: 20px;
			width: 300px;
			height: 120px;
			background: white;
			z-index: 1;

			flex-direction: column;
			justify-content: space-between;
			border: 1px #cfd7df solid;
			box-shadow: 0 2px 4px 0 rgb(24 50 71 / 8%);
			display: none;
		}

		.contact-card-content {
			margin-left: 20px;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}

		.contact-card-content-header {
			font-weight: 700;
			font-size: 16px;
			color: #000;
		}

		.contact-card-detail {
			padding: 15px 20px;
			background-color: #eee;
		}

		.ticket-header-search {
			margin-left: 10px;
		}

		.img-avatar {
			width: 44px;
			height: 44px;
			background: #ffdee0;
		}

		.contact-card-info {
			display: flex;
			align-items: center;
			padding: 15px 10px;
		}

		.contact-card-email {
			font-size: 12px;
			color: #000;
		}

		.modal.right .modal-dialog {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			min-width: 500px;
		}

		.form-export {

			border-radius: 5px;
			background-color: #ffffff;
			margin-top: 10px;

		}

		.header {
			padding: 5px;
			text-align: center;

		}

		.footer {
			display: flex;
			justify-content: flex-end;
			align-items: center;
			padding: 8px;
		}


		.accordion-item {
			padding: 5px;
			border-radius: 4px;
			border: 1px solid rgb(2, 2, 2);
			margin-bottom: 8px;
		}

		.accordion-item .filters {
			margin-top: 8px;
		}

		.accordion-item .filters .fields {
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
		}

		.accordion-item .filters .fields>div {
			flex: 50%;
		}

		.required {
			color: red;
		}

		.filter-group {
			display: flex;
		}

		.filter-group select {
			border: none;
		}

		.custom-control {
			display: flex;
			align-items: center;

		}

		.custom-control input {
			margin-right: 10px;
		}

		.custom-control label {
			margin-bottom: 0;
		}

		@media (min-width: 992px) {
			.filter-box {
				width: 250px !important;
			}
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="ticket-header sticky-top row">
			<div class="page-action-left col-md-3">
				<div class="ticket-checkall">
					<input type="checkbox" />
					<div class="sort-wrap">
						<span class="text-content">Sort by : </span>
						<div class="dropdown">
							<button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class='bx bx-sort'></i>
								Date created
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">Date created</a>
								<a class="dropdown-item" href="#">Priority</a>
								<a class="dropdown-item" href="#">Status</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Ascending</a>
								<a class="dropdown-item" href="#">Descending</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="page-action-right col-md-9">
				<div class="dropdown">
					<button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class='bx bx-add-to-queue'></i>
						New
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">New Ticket</a>
						<a class="dropdown-item" href="#">New Contact</a>
						<a class="dropdown-item" href="#">New Company</a>
					</div>
				</div>
				<div class="export">
					<button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#sidebar-right"><i class='bx bx-export'></i>Export</button>
				</div>
				<div class="ticket-header-search">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				</div>
				<div class="pagination">

					<a class="mobi-page" href="ticketsupport.php?page=<?= $Previous; ?>" aria-label="Previous">
						<span aria-hidden="true"><i class='bx bxs-left-arrow'></i></span>
					</a>


					<a class="mobi-page" href="ticketsupport.php?page=<?= 1; ?>">1</a>


					<?php for ($i = 2; $i <= $pages; $i++) :  ?>
						<a href="ticketsupport.php?page=<?= $i; ?>"></a>
					<?php endfor; ?>

					<a class="mobi-page" href="ticketsupport.php?page=<?= $Next; ?>" aria-label="Next">
						<span aria-hidden="true"><i class='bx bxs-right-arrow'></i></span>
					</a>

				</div>
				<div class="popup_info">
					<button type="button" id="btn-note" class="btn btn-outline-primary btn-sm"><i class='bx bx-edit-alt'></i> Note</button>
				</div>
				<div class="filter-aside">
					<button type="button" id="btn-filter" class="btn btn-outline-primary btn-sm"><i class='bx bx-filter-alt'></i> Filter</button>
					<aside class="main-sidebar sidebar-light-primary elevation-4 filter-box">

						<div class="sidebar" style="width:100%">

							<div class="filter-form">
								<div class="filter-form-header">Filter</div>
								<div class="filter-form-items">
									<form class="form-container">

										<div class="form-group">
											<label for="exampleFormControlSelect1">Agents</label>
											<select class="form-control" id="exampleFormControlSelect1">
												<option value="">Any agent </option>
												<option value="">Me</option>
												<option value="">Hayen</option>
												<option value="">Yen Nguyen</option>

											</select>
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Group</label>
											<select class="form-control" id="exampleFormControlSelect1">
												<option value="">My Groups</option>
												<option value="">Customer Support</option>
												<option value="">Billing</option>
												<option value="">Unassigned</option>

											</select>
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Created</label>
											<select class="form-control" id="exampleFormControlSelect1">

												<option value="">Today</option>
												<option value="">Yesterday</option>
												<option value="">Last 7 days</option>
												<option value="">Last 30 days</option>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Status</label>
											<select class="form-control" id="exampleFormControlSelect1">
												<option value="">All unresolved</option>
												<option value="">Open</option>
												<option value="">Pending</option>
												<option value="">Resolved</option>
												<option value="">Close</option>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Priority</label>
											<select class="form-control" id="exampleFormControlSelect1">
												<option value="">Low</option>
												<option value="">Medium</option>
												<option value="">High</option>
												<option value="">Urgent</option>

											</select>
										</div>
										<div class="form-group filter-form-submit">
											<button type="submit" class="btn btn-primary mb-2">Apply</button>
										</div>


									</form>
								</div>

							</div>
						</div>
					</aside>
				</div>
			</div>


		</div>
		<div class="container-fluid">

			<div class="table-list-ticket">
				<table id="" class="table table-bordered">
					<tbody>
						<tr style="background-color: #fff" class="ticket-list">
							<td>
								<div class="row ">
									<div class="col-md-9">
										<div class="ticket-wrap">
											<div class="ticket-checkbox">
												<input type="checkbox" class="checkbox" />
												<div class="img-avatar"></div>
											</div>

											<div class="text-content text-content-left">
												<a class="ticket-title" href="#"><span>#1</span> Demo Request <?php echo $userId; ?></a>
												<div class="ticket-text-info">
													<i class='bx bx-phone'></i>
													<svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 32 32" class="dot">
														<path d="M27.733 16c0 6.48-5.253 11.733-11.733 11.733S4.267 22.48 4.267 16 9.52 4.267 16 4.267 27.733 9.52 27.733 16z"></path>
													</svg>
													<div class="ticket-username">
														<div class="username-hover">Hà Nguyễn Tiểu Yến</div>
														<div class="contact-card-wrapper">
															<div class="contact-card-info">
																<div class="contact-card-avatar">
																	<div class="img-avatar"></div>
																</div>
																<div class="contact-card-content">
																	<span class="contact-card-content-header">Freshdesk</span>
																	<a href="#">View ticket</a>
																</div>
															</div>
															<div class="contact-card-detail">
																<div class="contact-card-email">
																	<span><i class='bx bx-phone'></i></span>
																	<span>hanguyentieuyen@gmail.com</span>
																</div>
															</div>
														</div>
													</div>

													<svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 32 32" class="dot">
														<path d="M27.733 16c0 6.48-5.253 11.733-11.733 11.733S4.267 22.48 4.267 16 9.52 4.267 16 4.267 27.733 9.52 27.733 16z"></path>
													</svg>
													<span>Created 18 hours ago</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class=text-content><i class='bx bxs-square'></i>
											<select class="ticket-left-item" title="Priority">
												<option value="">Low</option>
												<option value="">Medium</option>
												<option value="">High</option>
												<option value="">Urgent</option>
											</select>
											<div class="ticket-left-item"><i class='bx bx-user'></i>
												<select class="ticket-left-item" title="Status">
													<option value="">Assigned</option>

												</select>
											</div>
											<div class="ticket-left-item"><i class='bx bx-stats'></i>
												<select class="ticket-left-item" title="Status">
													<option value="">Open</option>
													<option value="">Pending</option>
													<option value="">Resolved</option>
													<option value="">Close</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>




					</tbody>
				</table>

			</div>

			<!-----------Sidebar-Expert----->
			<!-- Sidebar Right -->
			<div class="modal fade right" id="sidebar-right" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="form-export">
							<div class="header">
								<div>
									<h4>Export Tickets</h4>
								</div>
								<i class="fas fa-arrow-alt-from-top"></i>
							</div>
							<hr />
							<form action="form" class="p-2">
								<div class="form-group">
									<div class="filter-group">
										<label class="control-label pull-left pr-2">Export as:</label>
										<div class="custom-control custom-radio custom-control-inline">

											<input checked class="" id="customRadioInline1" name="customRadioInline1" type="radio">
											<label class="" for="customRadioInline1">Excel</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">

											<input class="" id="customRadioInline2" name="customRadioInline1" type="radio">
											<label class="" for="customRadioInline2">CSV</label>
										</div>
									</div>
									<br>
									<div class="filter-group">
										<label class="control-label pull-left pr-2">Filter tickets by:</label>
										<select aria-label="Status select" class="form-control-sm" id="statusFilter">

											<option selected value="1">Created time</option>
											<option value="2">Resolved time</option>
											<option value="3">Closed time</option>
										</select>
										<select aria-label="Days select" class="form-control-sm" id="daysFilter">
											<option selected value="1">Last 30 days</option>
											<option value="2">Last 7 days</option>
											<option value="3">From yesterday</option>
											<option value="4">Today</option>
										</select>
									</div>
									<div class="accordion-item ember-view">
										<div class="accordion-title" data-parent="#accordion" data-target="#ticketFields" data-toggle="collapse">
											<div class="d-flex justify-content-between">
												<div class="title-block">
													<span class="text--semibold">Ticket fields</span>
													<span class="required">*</span>
												</div>
												<div class="fields-selected text__infotext required-fields-count">
													<span class=" muted" data-test-id="field-count">
														<span id="numberTicketFieldsSelected">0</span> fields selected
													</span>
													<i class="fas fa-caret-right"></i>
												</div>
											</div>
											<div class="text__infotext">Please choose at least one ticket field to proceed</div>
										</div>
										<div class="collapse" id="ticketFields">
											<div class="filters">
												<div class="form-check select-all">
													<input class="form-check-input" type="checkbox" value="" id="ticketSelectAll">
													<label class="form-check-label" for="ticketSelectAll">
														Select all fields
													</label>
												</div>
												<div class="fields">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="ticketID">
														<label class="form-check-label" for="ticketID">
															Ticket ID
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="subject">
														<label class="form-check-label" for="subject">
															Subject
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="status">
														<label class="form-check-label" for="status">
															Status
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="priority">
														<label class="form-check-label" for="priority">
															Priority
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="source">
														<label class="form-check-label" for="source">
															Source
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="type">
														<label class="form-check-label" for="type">
															Type
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="agent">
														<label class="form-check-label" for="agent">
															Agent
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="group">
														<label class="form-check-label" for="group">
															Group
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="createdTime">
														<label class="form-check-label" for="createdTime">
															Created time
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="dueByTime">
														<label class="form-check-label" for="dueByTime">
															Due by Time
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="resolvedTime">
														<label class="form-check-label" for="resolvedTime">
															Resolved time
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="closedTime">
														<label class="form-check-label" for="closedTime">
															Closed time
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="lUpdTime">
														<label class="form-check-label" for="lUpdTime">
															Last update time
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="initResTime">
														<label class="form-check-label" for="initResTime">
															Initial reponse time
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="timeTracked">
														<label class="form-check-label" for="timeTracked">
															Time tracked
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="fRespTime">
														<label class="form-check-label" for="fRespTime">
															First response time (in hrs)
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="reslTime">
														<label class="form-check-label" for="reslTime">
															Resolution time (in hrs)
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="agentInteract">
														<label class="form-check-label" for="agentInteract">
															Agent interactions
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="cusInteract">
														<label class="form-check-label" for="cusInteract">
															Customer interactions
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="resolvStatus">
														<label class="form-check-label" for="resolvStatus">
															Resolution status
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="firstResStatus">
														<label class="form-check-label" for="firstResStatus">
															First response status
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="everyResStatus">
														<label class="form-check-label" for="everyResStatus">
															Every response status
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="ticketTags">
														<label class="form-check-label" for="ticketTags">
															Tags
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="surveyResults">
														<label class="form-check-label" for="surveyResults">
															Survey results
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="skill">
														<label class="form-check-label" for="skill">
															Skill
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="product">
														<label class="form-check-label" for="product">
															Product
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="accordion-item ember-view">
										<div class="accordion-title" data-parent="#accordion" data-target="#contactFields" data-toggle="collapse">
											<div class="d-flex justify-content-between">
												<div class="title-block">
													<span class="text--semibold">Contact fields</span>
												</div>
												<div class="fields-selected text__infotext required-fields-count">
													<span id="numberContactFieldsSelected">0</span> fields selected
													<i class="fas fa-caret-right"></i>
												</div>
											</div>
										</div>
										<div class="collapse" id="contactFields">
											<div class="filters">
												<div class="form-check select-all">
													<input class="form-check-input" type="checkbox" value="" id="contactSelectAll">
													<label class="form-check-label" for="contactSelectAll">
														Select all fields
													</label>
												</div>
												<div class="fields">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="fullName">
														<label class="form-check-label" for="fullName">
															Full name
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="workPhone">
														<label class="form-check-label" for="workPhone">
															Workphone
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="facebookID">
														<label class="form-check-label" for="facebookID">
															Facebook ID
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="contactID">
														<label class="form-check-label" for="contactID">
															Contact ID
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="language">
														<label class="form-check-label" for="language">
															Language
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="title">
														<label class="form-check-label" for="title">
															Title
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="twitterVerifiedProfile">
														<label class="form-check-label" for="twitterVerifiedProfile">
															Twitter verified profile
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="email">
														<label class="form-check-label" for="email">
															Email
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="mobilePhone">
														<label class="form-check-label" for="mobilePhone">
															Mobile phone
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="twitterID">
														<label class="form-check-label" for="twitterID">
															Twitter ID
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="timeZone">
														<label class="form-check-label" for="timeZone">
															Time zone
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="tags">
														<label class="form-check-label" for="tags">
															Tags
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="uniqueExternalID">
														<label class="form-check-label" for="uniqueExternalID">
															Unique External ID
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="twitterFollowCount">
														<label class="form-check-label" for="twitterFollowCount">
															Twitter follow count
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="accordion-item ember-view">
										<div class="accordion-title" data-parent="#accordion" data-target="#companyFields" data-toggle="collapse">
											<div class="d-flex justify-content-between">
												<div class="title-block">
													<span class="text--semibold">Company fields</span>
												</div>
												<div class="fields-selected text__infotext required-fields-count">
													<span id="numberCompanyFieldsSelected">0</span> fields selected

													<i class="fas fa-caret-right"></i>
												</div>
											</div>
										</div>
										<div class="collapse" id="companyFields">
											<div class="filters">
												<div class="form-check select-all">
													<input class="form-check-input" type="checkbox" value="" id="companySelectAll">
													<label class="form-check-label" for="companySelectAll">
														Select all fields
													</label>
												</div>
												<div class="fields">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="companyName">
														<label class="form-check-label" for="companyName">
															Company Name
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="companyDomains">
														<label class="form-check-label" for="companyDomains">
															Company Domains
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="healthScore">
														<label class="form-check-label" for="healthScore">
															Health score
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="accountTier">
														<label class="form-check-label" for="accountTier">
															Account tier
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="industry">
														<label class="form-check-label" for="industry">
															Industry
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="renewalDate">
														<label class="form-check-label" for="renewalDate">
															Renewal date
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
							<hr class="m-0" />
							<div class="footer">
								<button class="btn btn-light" type="button">Cancel</button>
								<button class="btn btn-primary ml-2" type="button">Export</button>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!--------pop up form----------->
			<div class="form-info-popup">
				<div class="popup_header">
					<div>
						<p class="popup_text">User Information</p>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-popup" action="form" id="form-popup-content">
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" value="123" placeholder="Your name..">
						</div>
					</div>
					<div class="form-group row">
						<label for="phone" class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="phone" value="" placeholder="Your phone..">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" value="" placeholder="Your mail ..">
						</div>
					</div>
					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="address" value="" placeholder="Your address...">
						</div>
					</div>
					<div class="form-group row">
						<label for="notes" class="col-sm-2 col-form-label">Note</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="notes" value="" rows="4"></textarea>
						</div>
					</div>
					<div class="footer popup-form-submit">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>

		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="js/zebra_dialog.min.js"></script>
		<script src="https://cdn.socket.io/4.5.0/socket.io.min.js"></script>
		<script type="text/javascript">
			var serverName = 'https://push.phodaugia.com';
			var userId = '<?php echo $userId; ?>';
			var socket = io(serverName);
			socket.on('chatMessage_' + userId, function(data) {
				$.ajax({
					url: 'find_customer.php',
					type: 'POSt',
					data: {
						data
					},
					dataType: 'json',
					success: function(res) {
						$('#form-popup-content #name').attr('value', res.name);
						$("#form-popup-content #phone").attr('value',res.phone);
						$("#form-popup-content #address").attr('value',res.address);
						$("#form-popup-content #notes").html(res.note);
						$("#form-popup-content #email").attr('value',res.email);
						showPopup();
					}
				});
			});
			$('.call-customer').on('click', function() {
				window.location.reload();
				var callHref = $(this).attr("my-href");
				$.ajax({
					url: callHref,
					type: 'GET',
					dataType: 'html',

				}).done(function(ketqua) {
					//$('#noidung').html(ketqua);
				});

			})


			function showPopup() {
				new $.Zebra_Dialog('Use confirmation messages to let the user know that an action has completed successfully.', {
					source: {
						inline: $("#form-popup-content").html()
					},
					title: 'Customer Information',
					type: false,
					modal: false,
					position: ['right - 20', 'bottom - 20'],
					buttons: false,
				});
			}

			$(document).ready(function() {


				$('#btn-filter').click(function() {
					$('.filter-box').toggleClass('filter-box-show')
				})

				$('#btn-note').click(function() {
					$('.form-info-popup').toggleClass('form-info-popup-show')
				})

				$('#ticketSelectAll').change(function() {
					var countChecked;
					if (this.checked) {
						$("#ticketFields .filters .fields > .form-check input[type=checkbox]").prop('checked', true);
						countChecked = $('#ticketFields .filters .fields > .form-check input[type=checkbox]').length;
					} else {
						$("#ticketFields .filters .fields > .form-check input[type=checkbox]").prop('checked', false);
						countChecked = 0;
					}
					$("#numberTicketFieldsSelected").text(countChecked);
				})

				$('#ticketFields .filters .fields > .form-check input[type=checkbox]').change(function() {
					if (this.checked) {
						var countCheckbox = $('#ticketFields .filters .fields > .form-check input[type=checkbox]').length;
						if (countCheckbox === countChecked) {
							$("#ticketSelectAll").prop('checked', true);
						}
					} else {
						$("#ticketSelectAll").prop('checked', false);
					}
					var countChecked = $('#ticketFields .filters .fields > .form-check input:checked').length;
					$("#numberTicketFieldsSelected").text(countChecked);
				})
				$('#contactSelectAll').change(function() {
					var countChecked;
					if (this.checked) {
						$("#contactFields .filters .fields > .form-check input[type=checkbox]").prop('checked', true);
						countChecked = $('#contactFields .filters .fields > .form-check input[type=checkbox]').length;
					} else {
						$("#contactFields .filters .fields > .form-check input[type=checkbox]").prop('checked', false);
						countChecked = 0;
					}
					$("#numberContactFieldsSelected").text(countChecked);
				})

				$('#contactFields .filters .fields > .form-check input[type=checkbox]').change(function() {
					if (this.checked) {
						var countCheckbox = $('#contactFields .filters .fields > .form-check input[type=checkbox]').length;
						if (countCheckbox === countChecked) {
							$("#contactSelectAll").prop('checked', true);
						}
					} else {
						$("#contactSelectAll").prop('checked', false);
					}
					var countChecked = $('#contactFields .filters .fields > .form-check input:checked').length;
					$("#numberContactFieldsSelected").text(countChecked);
				})

				$('#companySelectAll').change(function() {
					var countChecked;
					if (this.checked) {
						$("#companyFields .filters .fields > .form-check input[type=checkbox]").prop('checked', true);
						countChecked = $('#companyFields .filters .fields > .form-check input[type=checkbox]').length;
					} else {
						$("#companyFields .filters .fields > .form-check input[type=checkbox]").prop('checked', false);
						countChecked = 0;
					}
					$("#numberCompanyFieldsSelected").text(countChecked);
				})

				$('#companyFields .filters .fields > .form-check input[type=checkbox]').change(function() {
					if (this.checked) {
						var countCheckbox = $('#companyFields .filters .fields > .form-check input[type=checkbox]').length;
						if (countCheckbox === countChecked) {
							$("#companySelectAll").prop('checked', true);
						}
					} else {
						$("#companySelectAll").prop('checked', false);
					}
					var countChecked = $('#companyFields .filters .fields > .form-check input:checked').length;
					$("#numberCompanyFieldsSelected").text(countChecked);
				})
			})
		</script>
</body>

</html>