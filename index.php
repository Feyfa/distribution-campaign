<?php 

function distributionCampaign($totalLeads, $interval) 
{
  // hitung jumlah data per interval
  $dataPerHour = ceil($totalLeads / $interval);

  // hitung total dasar, dari data per hour di atas
  $totalDataDasar = $dataPerHour * $interval;

  // hitung selilsih nya
  $different = $totalDataDasar - $totalLeads;

  // jadikan ke array
  $distribution = array_fill(0, $interval, $dataPerHour);

  // elemen dari terakhir sebanyak different, itu dikurangi 1
  for($i = 0; $i < $different; $i++)
  {
    $distribution[$interval - 1 - $i]--;
  }
  
  return $distribution;
}

// leads per day
$campaign1 = 50;
$campaign2 = 80;
$campaign3 = 67;
$campaign4 = 73;
$campaign5 = 121;

// disribution 
$distribution1 = distributionCampaign($campaign1, 6);
$distribution2 = distributionCampaign($campaign2, 6);
$distribution3 = distributionCampaign($campaign3, 6);
$distribution4 = distributionCampaign($campaign4, 6);
$distribution5 = distributionCampaign($campaign5, 6);

print_r($distribution1);
print_r($distribution2);
print_r($distribution3);
print_r($distribution4);
print_r($distribution5);

// total leads yang harus di ambil tiap jam
$totalLeads = $distribution1[0] + $distribution2[0] + $distribution3[0] + $distribution4[0] + $distribution5[0];
print_r($totalLeads);