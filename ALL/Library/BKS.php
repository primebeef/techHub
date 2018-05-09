<pre>
<?php
//Author,BookByPubDate,NeededFromBookType,InfoType
//EAP (Edgar Allen Poe),000(The Raven),Info /Excerpt, PubD.
$DRX = array(
                'EAP' => array(
                    '000' => array(
                        
                        'info' => array(
                            'titl' => 'The Raven',
                            'type' => 'Synphian',
                            'Xage' => 7,
                            'Bday' => 'No Record Found (NRF)',
                                        )
                                    )
                            
      
    ),
                 'KEN' => array(
                                '000' => array(
                                    
                                    'info' => array(
                                        'name' => 'Makenna Turner',
                                        'type' => 'Human',
                                        'Xage' => 14,
                                        'Bday' => "04/03/2002",
                                        
                                                    )
                                                )
                                        
                  
    )
    );
/*print_r(array_keys($DRX['EAP']['000']['info']));
$key = array_search('Synphian', $DRX);
if (array_key_exists('EAP', $DRX)) {
    echo "The 'first' element is in the array";
}
echo $key;
*/
?>
</pre>