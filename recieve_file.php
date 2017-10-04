<?php 

namespace MicrosoftAzure\Storage\Samples;
require_once "../vendor/autoload.php";
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Blob\Models\ListContainersResult;
use MicrosoftAzure\Storage\Blob\Models\DeleteBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\GetBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\ContainerACL;
use MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesOptions;
use MicrosoftAzure\Storage\Blob\Models\ListPageBlobRangesOptions;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Common\Exceptions\InvalidArgumentTypeException;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\StorageServiceSettings;
use MicrosoftAzure\Storage\Common\Models\Range;
use MicrosoftAzure\Storage\Common\Models\Logging;
use MicrosoftAzure\Storage\Common\Models\Metrics;
use MicrosoftAzure\Storage\Common\Models\RetentionPolicy;
use MicrosoftAzure\Storage\Common\Models\ServiceProperties;
use MicrosoftAzure\Storage\Common\SharedAccessSignatureHelper;
use MicrosoftAzure\Storage\Common\ServicesBuilder;

$connectionString = 'DefaultEndpointsProtocol=https;AccountName=hfchewbaccastor;AccountKey=0N1QI4pOfpedFTpgI7W+YwAm+V9NyFA+89J8JXjXeYfaXQRtCQrVz0fyOueJYf6ZyoqFUGKC7hsQuxB/UcgX7A==;EndpointSuffix=core.usgovcloudapi.net';
$blobClient = ServicesBuilder::getInstance()->createBlobService($connectionString);


//if they DID upload a file...
if($_FILES['photo']['name'])
{
    echo "file is here";


    //if no errors...
	if(!$_FILES['photo']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['photo']['tmp_name']); //rename file
		if($_FILES['photo']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		
		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$new_file_name);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['photo']['error'];
	}
}

//you get the following information for each file:
echo $_FILES['field_name']['name'];
//$_FILES['field_name']['size']
//$_FILES['field_name']['type']
//$_FILES['field_name']['tmp_name']

?>