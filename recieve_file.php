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
//$blobClient = ServicesBuilder::getInstance()->createBlobService($connectionString);


//if they DID upload a file...
if($_FILES['photo']['name'])
{
    echo "file is here";

// Create blob REST proxy.
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

/*$content = fopen($_FILES['photo']['tmp_name'], "r");
$blob_name = "test";

try    {
    //Upload blob
    $blobRestProxy->createBlockBlob("images", $blob_name, $content);
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
*/



}

//you get the following information for each file:
echo $_FILES['field_name']['name'];
//$_FILES['field_name']['size']
//$_FILES['field_name']['type']
//$_FILES['field_name']['tmp_name']

?>