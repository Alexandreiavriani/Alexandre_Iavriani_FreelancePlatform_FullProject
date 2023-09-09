



<?php


$conn= new PDO("mysql:host=localhost;dbname=freelance;charset=utf8;","root","",);

session_start();
$user_id=$_SESSION['id'];





if(isset($_POST["rating_data"]) && isset($_GET['freelancer_name']) && isset($_GET['freelancer_surname']) && isset($_GET['user']) )
{
    
    $name=$_GET['freelancer_name'];
	$surname=$_GET['freelancer_surname'];

	
    
	$data = array(
		':user_name'		=>	$_POST["user_name"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	time(),
        
        
        
	);
    

	$query = "INSERT INTO review (user_name, user_rating, user_review, datetime,freelancer_name,freelancer_surname) 
	VALUES (:user_name, :user_rating, :user_review, :datetime,'$name','$surname')";

	$statement = $conn->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

	
	
   

}
 


if(isset($_POST["action"])  && isset($_GET['freelancer_name']) && isset($_GET['freelancer_surname']) && isset($_GET['user']))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$name=$_GET['freelancer_name'];
	$surname=$_GET['freelancer_surname'];
   

	$query = "SELECT * FROM review where freelancer_name='$name' and freelancer_surname='$surname'  ";

	$result = $conn->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y  A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}



?>

