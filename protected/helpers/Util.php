<?php

class Util {


	public static function modalSubcategory(Category $category)
	{
		$string = '
			<button data-target="#anim-modal'.$category->id.'" data-toggle="modal" class="btn btn-info">'.count($category->getFrontendCategories()).'</button>

			<div id="anim-modal'.$category->id.'" class="modal fade hide" style="display: none;" aria-hidden="true">
					<div class="modal-body">
					<div class="row-fluid">
                                	<div class="span12 widget">
                                        <div class="widget-content table-container">
                                        	<table class="table table-striped table-detail-view table-top-border">
                                            	<thead>
                                                	<tr>
                                                    	<th colspan="2"><h3>'.CHtml::image($category->getThumbImage(),"",array("width"=>"50")).'  '.$category->name.'</h3></th>
                                                    </tr>
                                                </thead>
                                            	<tbody>
                                            		'.self::getCategories($category) .'
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
					</div>
			</div>
		';

		return $string;
	}

	public static function getCategories(Category $category)
	{
		$string = '';
		if(count($category->getFrontendCategories()) < 1){
			$string .= '<tr>
							<th colspan="2"> There is no subcategory!</th>
					  </tr>';
		}

		foreach($category->getFrontendCategories() as $subcategories){
			$string .="<tr>
							<th><b>".$subcategories->name."</b></th>
							<td><b>".$subcategories->getStatusNameButton()."</b></td>
					  </tr>";
		}

		return $string;
	}
	
	public static function modal(User $user)
	{
		$string =  '
		<div id="view-modal'.$user->id.'" class="modal fade hide">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">×</button>
				User info
			</div>
			<div class="modal-body" id="modal_body_data">
				<div class="profile-head clearfix">
					<div class="widget-content summary-list">
						<ul>
							<li>
								<span class="key">
									<div class="thumbnail">
										<img src="'.$user->imgPath('normal').'" alt="">
									</div>
								</span>
								<span class="val">
									<h1 class="profile-username">'.$user->displayName.'</h1>
								</span>
							</li>
							<li>
								<span class="key"><i class="icos-address-book"></i> Email</span>
								<span class="val">
									<span class="text-nowrap">'.$user->email.'</span>
								</span>
							</li>
							<li>
								<span class="key"><i class="icos-clock"></i> Last login:</span>
								<span class="val">
									<span class="text-nowrap">'.$user->formatLastLogin().'</span>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
			</div>
		</div>
				 ' ;

		return $string;
	}

	public static function generateToken($type='token',$len = 32)
	{
		switch($type)
		{
			case 'basic'	: return mt_rand();
			break;
			case 'alnum'	:
			case 'numeric'	:
			case 'nozero'	:
			case 'alpha'	:
				switch ($type)
				{
					case 'alpha'	:	$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					break;
					case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					break;
					case 'numeric'	:	$pool = '0123456789';
					break;
					case 'nozero'	:	$pool = '123456789';
					break;
				}

				$str = '';
				for ($i=0; $i < $len; $i++)
				{
					$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
				}
				return $str;
				break;
			case 'token'    :   $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuiopasdfghjklzxcvbnm-_.!*';
			mt_srand((double)microtime()*1000000 + time());
			$chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuiopasdfghjklzxcvbnm-_.!*';
			$numChars = strlen($chars) - 1; $token = '';
			for ( $i=0; $i<$len; $i++ ) {
				$token .= $chars[ mt_rand(0, $numChars) ];
			}
			return $token;
			break;
			case 'unique'	:
			case 'md5'		:
				return md5(uniqid(mt_rand()));
				break;
		}
	}

	/**
	 * convert time to minutes (eg. 1 minute ago)
	 * @static
	 * @param $ptime
	 * @return string
	 */
	public static function time_elapsed_string($ptime)
	{
		$etime = time() - strtotime($ptime);

		if ($etime < 1)
		{
			return '0 seconds';
		}

		$a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
			30 * 24 * 60 * 60       =>  'month',
			24 * 60 * 60            =>  'day',
			60 * 60                 =>  'hour',
			60                      =>  'minute',
			1                       =>  'second'
		);

		foreach ($a as $secs => $str)
		{
			$d = $etime / $secs;
			if ($d >= 1)
			{
				$r = round($d);
				return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
			}
		}
	}

	public static function getBesBuyProductAttributes()
	{
		return array(
			"albumLabel",
			"albumTitle",
			"artistId",
			"artistName",
			"genre",
			"originalReleaseDate",
			"parentalAdvisory",
			"aspectRatio",
			"cast.name",
			"cast.role",
			"crew.name",
			"crew.role",
			"lengthInMinutes",
			"mpaaRating",
			"plot",
			"plotHtml",
			"studio",
			"theatricalReleaseDate",
			"esrbRating",
			"numberOfPlayers",
			"onlinePlay",
			"platform",
			"softwareAge",
			"softwareGrade",
			"tradeInValue",
			"builtInDigitalCamera",
			"carrierPlan",
			"deviceManufacturer",
			"earlyTerminationFees.contractLengthInMonths",
			"earlyTerminationFees.decliningAmount",
			"earlyTerminationFees.etfText",
			"earlyTerminationFees.terminationFee",
			"mms",
			"mobileOperatingSystem",
			"serviceProvider",
			"batteryLifeMin",
			"bluetoothEnabled",
			"bluRayPlayer",
			"displayType",
			"driveCapacityGb",
			"driveConnectivity",
			"lcdScreenSizeIn",
			"scannerType",
			"analogAudioInputs",
			"audioOutputs",
			"avOutputs",
			"bdLive",
			"brightnessLumens",
			"brightnessLux",
			"builtForBluRay",
			"builtInPlayer",
			"cdRRwCompatible",
			"channelLabeling",
			"clock",
			"coaxialDigitalAudioOutputs",
			"combFilter",
			"componentVideoInputs",
			"componentVideoOutputs",
			"compositeVideoInputs",
			"compositeVideoOutputs",
			"contrastRatio",
			"depthWithoutStandIn",
			"depthWithStandIn",
			"digitalAudioInputs",
			"digitalAudioOutputs",
			"digitalOutputs",
			"digitalTuner",
			"discCapacity",
			"dolbyDigitalDecoder",
			"dvdPlayer",
			"dviInputs",
			"dviOutputs",
			"dynamicContrastRatio",
			"ethernetPort",
			"fiveOneChannelInput",
			"fiveOneChannelOutput",
			"frontPanelAvInputs",
			"frontSurroundPowerPerChannel",
			"hdmiInputs",
			"hdmiOutputs",
			"hdRadioCompatible",
			"hdRadioReady",
			"hdtvCompatibility",
			"headphoneJacks",
			"heightWithoutStandIn",
			"heightWithStandIn",
			"ieee1394FirewirePort",
			"instantContent.provider",
			"internetConnectable",
			"iphoneAccessory",
			"ipodConnection",
			"ipodDock",
			"ipodReady",
			"languageOptions.language",
			"maximumOutputResolution",
			"maximumPowerHandling",
			"maximumResolutionHorizontalPx",
			"maximumResolutionVerticalPx",
			"mediaCardSlot",
			"mediaPort",
			"mountBracketVesaPattern",
			"mp3PlaybackCapability",
			"multiroomCapability",
			"numberOfChannels",
			"numberOfSpeakers",
			"onScreenDisplay",
			"opticalDigitalAudioOutputs",
			"pcInputs",
			"peakPowerHandling",
			"phonoInputs",
			"pictureInPicture",
			"playbackFormats.format",
			"playerType",
			"preampOutputs",
			"productAspectRatio",
			"rearSurroundPowerPerChannel",
			"remoteControlType",
			"rfAntennaInputs",
			"satelliteRadioReady",
			"screenRefreshRateHz",
			"screenSizeClassIn",
			"screenSizeIn",
			"sdCardSlot",
			"shelfSystemType",
			"simulatedSurround",
			"sixOneChannelInput",
			"sleepTimer",
			"smartCapable",
			"soundLeveler",
			"soundType",
			"speakerAbSwitching",
			"speakerLocation",
			"stationPresets",
			"subwooferPowerWatts",
			"subwooferSizeIn",
			"surroundSoundDecoders",
			"sVideoInputs",
			"sVideoOutputs",
			"threeDPassThrough",
			"threeDReady",
			"totalHarmonicDistortion",
			"totalReceiverPower",
			"totalSystemPowerWatts",
			"tvType",
			"usbPort",
			"vChip",
			"verticalResolution",
			"videoUpConversion",
			"wattsPerChannel",
			"wifiBuiltIn",
			"wifiReady",
			"wirelessSubwoofer",
			"cabinetSideColor",
			"capacityCuFt",
			"childLock",
			"controlLocation",
			"controlType",
			"energyConsumptionKwhPerYear",
			"energyStarQualified",
			"estimatedYearlyOperatingCosts.estimatedYearlyOperatingCost",
			"interiorLight",
			"sabbathMode",
			"capacityFreezerCuFt",
			"capacityFreshFoodCuFt",
			"counterDepth",
			"depthIncludingHandlesIn",
			"depthLessDoorIn",
			"depthWithDoorOpenIn",
			"depthWithoutHandlesIn",
			"dispenserColor",
			"doorHandleColor",
			"doorOpenAlarm",
			"factoryInstalledIceMaker",
			"gallonDoorStorage",
			"heightToTopOfDoorHingeIn",
			"heightToTopOfRefrigeratorIn",
			"humidityControlledCrisper",
			"shelfConstruction",
			"style",
			"surfaceFinish",
			"temperatureControlType",
			"thruTheDoorIceDispenser",
			"thruTheDoorWaterDispenser",
			"waterFilterLocation",
			"waterFilterModelNumber",
			"waterFiltration",
			"waterFiltrationReplacementIndicatorLight",
			"agitatorType",
			"automaticTemperatureControl",
			"bleachDispenser",
			"compactDesign",
			"customSettings",
			"cycleDescriptions.cycleDescription",
			"delayedStart",
			"delicateCycle",
			"drumAndInteriorFinish",
			"dryingRack",
			"endOfCycleSignal",
			"extraDelicateCycle",
			"fabricDispenser",
			"handWashCycle",
			"highEfficiency",
			"ledButtons",
			"lintFilterLight",
			"loadAccess",
			"moistureSensor",
			"noiseReduction",
			"numberOfCycles",
			"numberOfWashCycles",
			"permanentPressCycle",
			"powerSource",
			"powerSourceRatings",
			"preWashDispenser",
			"reversibleDoorHinge",
			"sanitationAllergyCycle",
			"secondRinse",
			"stackable",
			"steam",
			"touchPadControls",
			"vibrationReduction",
			"waterEfficiency",
		);
	}
}