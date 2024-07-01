<html>
<head>
<title>	Api Information</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h3 align="center">Job Portal</h3>
<p><b>All Job Display</b></p>
<a href="<?= base_url('api/all_job'); ?>"><?= base_url('api/all_job'); ?></a><br><hr><br>
<p><b>Singl Job Display</b></p>
<a href="<?= base_url('api/single_job'); ?>"><?= base_url('api/single_job'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>job_id</td>
<td>Job Id</td>
</tr>
</table>
<hr><br>

<p><b>signup</b></p>
<a href="<?= base_url('api/signUp'); ?>"><?= base_url('api/signUp'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>type</td>
<td>seeker / recruiter </td>
</tr>
<tr>
<td>email</td>
<td>Seeker / Recruiter E-Mail</td>
</tr>
<tr>
<td>name</td>
<td>Seeker / Recruiter name</td>
</tr>
<tr>
<td>mno</td>
<td>Seeker / Recruiter Mobile No</td>
</tr>
<tr>
<td>ps</td>
<td>Seeker / Recruiter  password</td>
</tr>
</table>
<hr><br>

<p><b>Login</b></p>
<a href="<?= base_url('api/login'); ?>"><?= base_url('api/login'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>type</td>
<td>seeker / recruiter </td>
</tr>
<tr>
<td>email</td>
<td>Seeker / Recruiter E-Mail</td>
</tr>
<tr>
<td>ps</td>
<td>Seeker / Recruiter Password</td>
</tr>
</table>
<hr><br>

<p><b>My Applied Jobs</b></p>
<a href="<?= base_url('api/my_applied_job'); ?>"><?= base_url('api/my_applied_job'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>email</td>
<td>Seeker E-Mail</td>
</tr>
</table>
<hr><br>

<p><b>My Jobs</b></p>
<a href="<?= base_url('api/myjobs'); ?>"><?= base_url('api/myjobs'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>email</td>
<td>Recruiter E-Mail</td>
</tr>
</table>
<hr><br>

<p><b>job Post</b></p>
<a href="<?= base_url('api/job_post'); ?>"><?= base_url('api/job_post'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>job_type</td>
<td>Job Type</td>
</tr>
<tr>
<td>r_email</td>
<td>Recruiter E-Mail</td>
</tr>
<tr>
<td>designation</td>
<td>Job designation</td>
</tr>
<tr>
<td>qualification</td>
<td>Required Qualification</td>
</tr>
<tr>
<td>job_location</td>
<td>Job Location</td>
</tr>
<tr>
<td>year_of_passing</td>
<td>Required Passing Year</td>
</tr>
<tr>
<td>pre_cgpa</td>
<td>CGPA</td>
</tr>
<tr>
<td>specialization</td>
<td>Job specialization</td>
</tr>
<tr>
<td>area_of_sector</td>
<td>area of sector</td>
</tr>
<tr>
<td>exp</td>
<td>Seeker Experience</td>
</tr>
<tr>
<td>number_of_vacancies</td>
<td>number of vacancies	</td>
</tr>
<tr>
<td>lasr_date_application</td>
<td>last date application</td>
</tr>
<tr>
<td>salary_range</td>
<td>salary range</td>
</tr>
<tr>
<td>min</td>
<td>Minimum salary</td>
</tr>
<tr>
<td>max</td>
<td>Maximum salary</td>
</tr>
<tr>
<td>r_id</td>
<td>Recruiter E-Mail</td>
</tr>
<tr>
<td>pay_count</td>
<td>Payment Count (int)</td>
</tr>
<tr>
<td>post_date</td>
<td>Payment Date</td>
</tr>
<tr>
<td>application</td>
<td></td>
</tr>
<tr>
<td>technology</td>
<td>Required technology</td>
</tr>
<tr>
<td>job_desc</td>
<td>Job Desacription</td>
</tr>
<tr>
<td>written_test</td>
<td>hiring_process written test (yes/no)</td>
</tr>
<tr>
<td>group_discussion</td>
<td>hiring_process group discussion (yes/no)</td>
</tr>
<tr>
<td>technical_round	</td>
<td>hiring_process technical round	(yes/no)</td>
</tr>
<tr>
<td>hr_round</td>
<td>hiring_process hr_round (yes/no)</td>
</tr>
<tr>
<td>meta_desc</td>
<td>Meta Tag Description</td>
</tr>
<tr>
<td>meta_keyword</td>
<td>Meta tag Keyword</td>
</tr>
<tr>
<td>author</td>
<td>meta tag author name</td>
</tr>
</table>
<hr><br>
<p><b>Job Update display</b></p>
<a href="<?= base_url('api/job_edit'); ?>"><?= base_url('api/job_edit'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>job_id</td>
<td>Job ID</td>
</tr>
</table>
<hr><br>
<p><b>Update job Post</b></p>
<a href="<?= base_url('api/update_job_post'); ?>"><?= base_url('api/update_job_post'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>job_type</td>
<td>Job Type</td>
</tr>
<tr>
<td>id</td>
<td>job Id</td>
</tr>
<tr>
<td>r_email</td>
<td>Recruiter E-Mail</td>
</tr>
<tr>
<td>designation</td>
<td>Job designation</td>
</tr>
<tr>
<td>qualification</td>
<td>Required Qualification</td>
</tr>
<tr>
<td>job_location</td>
<td>Job Location</td>
</tr>
<tr>
<td>year_of_passing</td>
<td>Required Passing Year</td>
</tr>
<tr>
<td>pre_cgpa</td>
<td>CGPA</td>
</tr>
<tr>
<td>specialization</td>
<td>Job specialization</td>
</tr>
<tr>
<td>area_of_sector</td>
<td>area of sector</td>
</tr>
<tr>
<td>exp</td>
<td>Seeker Experience</td>
</tr>
<tr>
<td>number_of_vacancies</td>
<td>number of vacancies	</td>
</tr>
<tr>
<td>lasr_date_application</td>
<td>last date application</td>
</tr>
<tr>
<td>salary_range</td>
<td>salary range</td>
</tr>
<tr>
<td>min</td>
<td>Minimum salary</td>
</tr>
<tr>
<td>max</td>
<td>Maximum salary</td>
</tr>
<tr>
<td>r_id</td>
<td>Recruiter E-Mail</td>
</tr>
<tr>
<td>pay_count</td>
<td>Payment Count (int)</td>
</tr>
<tr>
<td>post_date</td>
<td>Payment Date</td>
</tr>
<tr>
<td>application</td>
<td></td>
</tr>
<tr>
<td>technology</td>
<td>Required technology</td>
</tr>
<tr>
<td>job_desc</td>
<td>Job Desacription</td>
</tr>
<tr>
<td>written_test</td>
<td>hiring_process written test (yes/no)</td>
</tr>
<tr>
<td>group_discussion</td>
<td>hiring_process group discussion (yes/no)</td>
</tr>
<tr>
<td>technical_round	</td>
<td>hiring_process technical round	(yes/no)</td>
</tr>
<tr>
<td>hr_round</td>
<td>hiring_process hr_round (yes/no)</td>
</tr>
<tr>
<td>meta_desc</td>
<td>Meta Tag Description</td>
</tr>
<tr>
<td>meta_keyword</td>
<td>Meta tag Keyword</td>
</tr>
<tr>
<td>author</td>
<td>meta tag author name</td>
</tr>
</table>
<hr><br>

<p><b>Applied Seeker</b></p>
<a href="<?= base_url('api/applied_seeker'); ?>"><?= base_url('api/applied_seeker'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>recruiter_email</td>
<td>Recruiter E-Mail</td>
</tr>
</table>
<hr><br>

<p><b>Seeker Information</b></p>
<a href="<?= base_url('api/seeker_info'); ?>"><?= base_url('api/seeker_info'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>seeker_email</td>
<td>Seeker E-Mail</td>
</tr>
</table>
<hr><br>

<p><b>Seeker Profile Upload</b></p>
<a href="<?= base_url('api/user_profile_update'); ?>"><?= base_url('api/user_profile_update'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>name</td>
<td>Seeker Name</td>
</tr>
<tr>
<td>mno</td>
<td>Seeker Mobile No</td>
</tr>
<tr>
<td>current_address</td>
<td>current address</td>
</tr>
<tr>
<td>p_locaion</td>
<td>Location</td>
</tr>
<tr>
<td>job_type</td>
<td>Job Type</td>
</tr>
<tr>
<td>qua</td>
<td>Qualification</td>
</tr>
<tr>
<td>p_year</td>
<td>Passing Year</td>
</tr>
<tr>
<td>cgpa</td>
<td>Seeker CGPA</td>
</tr>
<tr>
<td>aofs</td>
<td>Area of Sector</td>
</tr>
<tr>
<td>exp</td>
<td>Experience</td>
</tr>
<tr>
<td>resume</td>
<td>Resume (DOC And PDF)</td>
</tr>
<tr>
<td>ps</td>
<td>Seeker Password</td>
</tr>
<tr>
<td>email</td>
<td>Seeker E-Mail</td>
</tr>
</table>
<hr><br>

<p><b>Recruiter Profile Update</b></p>
<a href="<?= base_url('api/recruiter_profile_update'); ?>"><?= base_url('api/recruiter_profile_update'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>org_type</td>
<td>organisation type (company/consultancy)</td>
</tr>
<tr>
<td>location</td>
<td>Recruiter Location (city name)</td>
</tr>
<tr>
<td>address</td>
<td>Recruiter Address</td>
</tr>
<tr>
<td>website</td>
<td>Recruiter Website URL </td>
</tr>
<tr>
<td>des</td>
<td>Recruiter description</td>
</tr>
<tr>
<td>img</td>
<td>img url</td>
</tr>
</table>
<hr><br>

<p><b>Seeker Profile Pic  Update</b></p>
<a href="<?= base_url('api/pro_pic_upload'); ?>"><?= base_url('api/pro_pic_upload'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>s_email</td>
<td>Seeker E-Mail</td>
</tr>
<tr>
<td>img</td>
<td>image information</td>
</tr>
</table>
<hr><br>

<p><b>Forget Password</b></p>
<a href="<?= base_url('api/forgot_password'); ?>"><?= base_url('api/forgot_password'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>type</td>
<td>User Type</td>
</tr>
<tr>
<td>email</td>
<td>User E-Mail (Seeker/Recruiter)</td>
</tr>
</table>
<hr><br>
<h3>Filter</h3>
<p><b>Text Filter</b></p>
<a href="<?= base_url('api/search_text'); ?>"><?= base_url('api/search_text'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>search_txt</td>
<td>Location/qualification/job_type</td>
</tr>
</table>
<hr><br>
<p><b>Fetch data</b></p>
<a href="<?= base_url('api/fetch'); ?>"><?= base_url('api/fetch'); ?></a><br>
<table class="table">
<tr>
<td><b>parameter</b></td>
<td><b>Description</b></td>
</tr>
<tr>
<td>keyword</td>
<td> location / qualification / job_type / area_of_sectors / designation / experience / job_role / job_types /   specialization</td>
</tr>
</table>
<hr><br>
</div>
</body>
</html>