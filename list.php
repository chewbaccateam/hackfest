<h1>Images</h1>

<?php
require_once 'vendor/autoload.php';

use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

// Create blob REST proxy.
$connectionString='BlobEndpoint=https://hfchewbaccastor.blob.core.usgovcloudapi.net/;DefaultEndpointsProtocol=https;AccountName=hfchewbaccastor;AccountKey=0N1QI4pOfpedFTpgI7W+YwAm+V9NyFA+89J8JXjXeYfaXQRtCQrVz0fyOueJYf6ZyoqFUGKC7hsQuxB/UcgX7A==;';


$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

try    {
    // List blobs.
    $blob_list = $blobRestProxy->listBlobs("images");
    $blobs = $blob_list->getBlobs();

    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>URL</th>"; 
    echo "</tr>";
    
    
    foreach($blobs as $blob)
    {
        echo "<tr>";
        //echo $blob->getName().": ".$blob->getUrl()."<br />";
        echo "<td>".$blob->getName()."<td />";
        echo "<td>".$blob->getUrl()."<td />";
        echo "</tr>";
    }
    
    echo "</table>";
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
?>  

<a download="<?php echo $image; ?>" href="https://hfchewbaccastor.blob.core.usgovcloudapi.net/images/davesfile" title="Logo title">
        <img alt="logo" src="http://localhost/sc/img/logo.png">
</a>
    

