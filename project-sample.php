<?php include_once('./includes/init.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<?php include_once('./includes/css.php'); ?>
</head>
<body class="project-detail-page">
	<?php include_once('./includes/menu.php'); ?>
	<div class="container">
		<div class="height-block"></div>
		<div class="row-fluid">
			<h3>Sample Project Title</h3>
			<p class="muted">Sample Organization Title</p>
		</div>
		
		
		<div class="height-block"></div>

		<div class="row-fluid">
			<div class="span4">
				<div class="project-image-holder">
					<?php
					$project['images'] = '';
					if(strlen($project['images'])){
						$images = explode('||',$project['images']);
						$main_image = $images[0];
						if(substr($main_image,0,1) !== '/') $main_image = '/' . $main_image;
					} else {
						$main_image = '/images/defaults/project-image.png';
					};
					?>
					<img class="project-image" src="<?php echo $main_image; ?>" />
				</div>
				<?php if(count($images) > 1){
					echo '<div class="row-fluid">';
					foreach($images as $key => $image){
						if($key == 0) continue;
						if(substr($image,0,1) !== '/') $image = '/' . $image;
						echo '<img class="project-thumbnail-image" src="' . $image . '" />';
					};
					echo '</div>';
				}; ?>
				
				<div class="height-block"></div>
				<div class="organization-description">
					
				</div>
				<div class="height-block"></div>
				<a class="btn btn-block btn-large btn-primary" href="/organization.php?id=<?php //echo $project['organization']; ?>">View Organization Details</a>
				<div class="height-block"></div>
				<div class="social-buttons">
					<a href="#" class="btn btn-primary"><i class="icon-facebook"></i> &nbsp;Facebook Page</a>
					<a href="#" class="btn btn-primary pull-right"><i class="icon-twitter"></i> &nbsp;Twitter Page</a>
				</div>
			</div>
			
			<div class="span8">
				<div class="project-description">
					
					

<h5>Green Cow</h5>

<p>Cow Green is an area in Cameron Highlands. It is located at the crossroads entrance to Sg Palas Tea Plantation. There are 10 families living at the foothills of the Green Cow.</p>

<p>A multi-million project by a developer (LTT Development Sdn Bhd) threatened the Green Cow landscape and threatening the life of 10 families who lives at the foot of the hill.</p>

 

<h5>2 developers</h5>

<p>The resident’s nightmare began when an excavator belonging to two developers, Ng Ng and LTT Yeet Development Sdn Bhd started clearing the land in August 2011. During the same time, a large boulder rolled near to the road due to the work of LTT Development. These are just a few days after a landslide occurred at Kg Sg Ruil (Aboriginal village) which killed seven people (August 7, 2011).</p>

<p>The permit for LTT for land clearing was temporarily suspended by the District Office Cameron consequences of this incident.</p>

 

<h5>Residents Coalition Formation Green Cow</h5>

<p>In September 2011, in order to fight for the rights of the safe house, Cow Green Residents Coalition was formed which represented seven out of 10 families on the efforts of the Socialist Party of Malaysia (PSM Cameron). Many police reports, letters and memoranda were sent. But the land clearing work never stopped.</p>

 

<h5>2 residents & 1 PSM activists arrested</h5>

<p>As there was no action from any party, the residents stopped a machine which belongs to one of the developer (Ng Yeet Ng) from work on 13/10/2011. A result of this incident, police has arrested two residents, S.Nagarajan and S.Thanabalan; and a PSM activist, Suresh Kumar. They were then charged in Cameron Magistrate Court under section 341KK and 506KK (wrongful obstruction & criminal intimidation). However, after hearing the case, all of them were released by the Magistrate on 30.7.2012 with the judgment that the residents stopped the machine because the safeties of the houses were threatened.</p>

 

<h5>Development records were kept secret by Cameron District Council</h5>

<p>Residents Coalition has also called for the project documents to be revealed to be referred to an independent civil engineer but the request was not entertained by Cameron Highlands District Council. In a meeting with the District Officer Cameron on 11/11/2011, he has requested security issues to be addressed immediately and local authorities should ensure that all soil and rock are covered. But these things were never complied by the developer.</p>

<p>Why these records be kept confidential? Is it because of the approval of this project is given in non-transparent?</p>

 

<h5>Gangster shows gun, police asked the brand of the gun</h5>

<p>In March 2012, LTT Development sent gangsters for demolition the goat-shed which belongs to one of the people, but the demolition was stopped by the residents. Gangster fled when they saw residents & supporters began to gather.</p>

<p>The gangsters produced a gun during the incident. However, when the people make a police report; Cameron Police asked the residents the gun brand used and the 'birth certificate' for a lost goat. Up to today, no arrests were made against gangster (no parade) despite residents provided the vehicle registration number and the description of the gangsters.</p>

 

<h5>Residents setup tent</h5>

<p>As there was no action from any party, the people have made a tent in the project on 5/28/12 for Developer LTT project to stop until we get the answers of their live safety. As a result, developers are no longer works near resident’s home.</p>

 

<h5>Developer offered RM 30,000</h5>

<p>The developer then has agreed to provide compensation of RM30, 000 to each family to relocate. But RM30,000 is not enough to build a house. And no place is being provided by the government for them to build a house.</p>

 

<h5>Police arrest Green Cow residents who tried to meet MB in Kuantan</h5>

<p>Following no positive response from the local governments in Cameron Highland, the combination of the Cameron residents has sought intervention of the Chief Minister of Pahang, but no response were given. Minister promises great visit and solve the problems of the people Cameron in April 2012 did not fulfill the promise.</p>

<p>In fact, the population of Cameron Green Cow with the people who go to request an appointment had been detained and roughed Kuantan police during their visit to Pahang MB Office on 10.07.2012. All 25 of them entered into lock-up for a day before being released.</p>

 

<h5>Empty promises MB and Dato Palanivel</h5>

<p>After the arrests in Kuantan, Pahang MB, Dato Sri Adnan Yaakob with Minister in the Prime Minister, Dato G.Palanivel gave empty promises that Green Cow population problem has been solved.</p>

<p>Datuk Palanivel in a press release on 07.17.2012 has informed that the people of Green Cow has given replacement land. This was a confession that the place they are occupying now is danger.</p>

<p>But to this day no such solution to the population although the people have sent two letters KPD Dato G.Palanivel.</p>

 

<h5>Population and Development HRD sued by LTT</h5>

<p>On 8/17/12, 7 head of the family and Suresh Kumar has received an injunction and lawsuit dr LTT Development. Summons and injunction application was heard in the High Mahkahmah Kuantan since 14/9/2012.</p>

 

<h5>More charges in court</h5>

<p>As revenge, the DPP has appealed the case of PSM activists & 2 population to the High Court Temerloh since 10/08/2012 and on 11/09/2012, two more people were charged under Section 341KK (barrier one for arresting trucks developers speed). All this shows that there is a conspiracy to oust Green Cow Population through dirty tactics and use a variety of channels, including the police and the courts.</p>

<p>This increases the burden Green Cow Population in championing their issues.</p>

 

<h5>Application for financial assistance</h5>

<p>After a struggle so far, four families have left the Combined Population. Now there remained only three families fight for their cause. We would like to solicit donations of friends to continue the struggle. Much-needed financial assistance for expenses:</p>

<p>The expenses include 3 crucial</p>
<ol>
	<li>Court costs and attorney</li>
	<li>transportation, accommodation and food from Cameron to Kuantan and also to other places about this campaign</li>
	<li>print flyers and campaign materials</li>
</ol>

<p>Cow Green problem is also related to environmental</p>

<p>Many people have complained that Cameron Highlands is not as cold as before. Also landslide issues as sustainable development is not in the mountains. Cow Green Issue 10 families is not the issue, but it involves a larger environment.</p>

 

<p>Apart from the solution for a 3 family in Green Cow, this case will also be used to bring to the attention of the Malaysian public about the issue of forest and environmental destruction in Cameron. Among the environmental problems due to the two projects are:</p>

<ol>
<li>forest destruction in Green Cow</li>
<li>development does not follow the rules the hills</li>
<li>projects of river pollution due to land</li>
<li>Cameron traffic system will be worse</li>
</ol>

 

<p>WE NEED HELP FOR THOSE WHO THREATENED AGAINST ENVIRONMENT AND THE COURAGE TO HELP FAMILIES 10 hillside PREVENTION PROJECT</p>



				</div>
				<div class="height-block"></div>
				
				
			</div>		
		</div>		
	</div>
	<?php include_once('./includes/js.php'); ?>
</body>
</html>