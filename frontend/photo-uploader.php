<?php
	// Installed the need packages with Composer by running:
	// $ composer require aws/aws-sdk-php
	require 'aws/aws-autoloader.php';
	$bucketName = 'jvaz-images';
	$filePath = './102093.jpg';
	$keyName = basename($filePath);
	$IAM_KEY = 'AKIA5VMUHW55VXEZACTN';
	$IAM_SECRET = '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';
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	// Set Amazon S3 Credentials
	$s3 = S3Client::factory(
		array(
			'credentials' => array(
				'key' => $IAM_KEY,
				'secret' => $IAM_SECRET
			),
			'version' => 'latest',
			'region'  => 'us-east-1'
		)
	);
  
  // The region matters. I'm using "US Ohio" so "us-east-2" is the corresponding
  // region code. You can google it or upload a file to the S3 bucket and look at
  // the public url. It will look like:
  // https://s3.us-east-2.amazonaws.com/YOUR_BUCKET_NAME/image.png
  // 
  // As you can see the us-east-2 in the url.
	try {
		// So you need to move the file on $filePath to a temporary place.
		// The solution being used: http://stackoverflow.com/questions/21004691/downloading-a-file-and-saving-it-locally-with-php
		if (!file_exists('/tmp/tmpfile')) {
			mkdir('/tmp/tmpfile',0777, true);
		}
		
		// Create temp file
		$tempFilePath = '/tmp/tmpfile/' .basename($filePath);
		$tempFile = fopen($tempFilePath, "w") or die("Error: Unable to open file.");
		$fileContents = file_get_contents($filePath);
		$tempFile = file_put_contents($tempFilePath, $fileContents);
		
		
		// Put on S3
		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $tempFilePath,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);
	} catch (S3Exception $e) {
		echo $e->getMessage();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>