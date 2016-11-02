<?php

class Color
{
	protected $red;
	protected $green;
	protected $blue;

	protected $hue;
	protected $saturation;
	protected $brightness;

	protected $colors;

	public function __construct()
	{
		$this->colors["aliceblue"] = array("red" => 240, "green" => 248, "blue" => 255);
		$this->colors["antiquewhite"] = array("red" => 250, "green" => 235, "blue" => 215);
		$this->colors["aqua"] = array("red" => 0, "green" => 255, "blue" => 255);
		$this->colors["aquamarine"] = array("red" => 127, "green" => 255, "blue" => 212);
		$this->colors["azure"] = array("red" => 240, "green" => 255, "blue" => 255);
		$this->colors["beige"] = array("red" => 245, "green" => 245, "blue" => 220);
		$this->colors["bisque"] = array("red" => 255, "green" => 228, "blue" => 196);
		$this->colors["black"] = array("red" => 0, "green" => 0, "blue" => 0);
		$this->colors["blanchedalmond"] = array("red" => 255, "green" => 235, "blue" => 205);
		$this->colors["blue"] = array("red" => 0, "green" => 0, "blue" => 255);
		$this->colors["blueviolet"] = array("red" => 138, "green" => 43, "blue" => 226);
		$this->colors["brown"] = array("red" => 165, "green" => 42, "blue" => 42);
		$this->colors["burlywood"] = array("red" => 222, "green" => 184, "blue" => 135);
		$this->colors["cadetblue"] = array("red" => 95, "green" => 158, "blue" => 160);
		$this->colors["chartreuse"] = array("red" => 127, "green" => 255, "blue" => 0);
		$this->colors["chocolate"] = array("red" => 210, "green" => 105, "blue" => 30);
		$this->colors["coral"] = array("red" => 255, "green" => 127, "blue" => 80);
		$this->colors["cornflowerblue"] = array("red" => 100, "green" => 149, "blue" => 237);
		$this->colors["cornsilk"] = array("red" => 255, "green" => 248, "blue" => 220);
		$this->colors["crimson"] = array("red" => 220, "green" => 20, "blue" => 60);
		$this->colors["cyan"] = array("red" => 0, "green" => 255, "blue" => 255);
		$this->colors["darkblue"] = array("red" => 0, "green" => 0, "blue" => 139);
		$this->colors["darkcyan"] = array("red" => 0, "green" => 139, "blue" => 139);
		$this->colors["darkgoldenrod"] = array("red" => 184, "green" => 134, "blue" => 11);
		$this->colors["darkgray"] = array("red" => 169, "green" => 169, "blue" => 169);
		$this->colors["darkgrey"] = array("red" => 169, "green" => 169, "blue" => 169);
		$this->colors["darkgreen"] = array("red" => 0, "green" => 100, "blue" => 0);
		$this->colors["darkkhaki"] = array("red" => 189, "green" => 183, "blue" => 107);
		$this->colors["darkmagenta"] = array("red" => 139, "green" => 0, "blue" => 139);
		$this->colors["darkolivegreen"] = array("red" => 85, "green" => 107, "blue" => 47);
		$this->colors["darkorange"] = array("red" => 255, "green" => 140, "blue" => 0);
		$this->colors["darkorchid"] = array("red" => 153, "green" => 50, "blue" => 204);
		$this->colors["darkred"] = array("red" => 139, "green" => 0, "blue" => 0);
		$this->colors["darksalmon"] = array("red" => 233, "green" => 150, "blue" => 122);
		$this->colors["darkseagreen"] = array("red" => 143, "green" => 188, "blue" => 143);
		$this->colors["darkslateblue"] = array("red" => 72, "green" => 61, "blue" => 139);
		$this->colors["darkslategray"] = array("red" => 47, "green" => 79, "blue" => 79);
		$this->colors["darkslategrey"] = array("red" => 47, "green" => 79, "blue" => 79);
		$this->colors["darkturquoise"] = array("red" => 0, "green" => 206, "blue" => 209);
		$this->colors["darkviolet"] = array("red" => 148, "green" => 0, "blue" => 211);
		$this->colors["deeppink"] = array("red" => 255, "green" => 20, "blue" => 147);
		$this->colors["deepskyblue"] = array("red" => 0, "green" => 191, "blue" => 255);
		$this->colors["dimgray"] = array("red" => 105, "green" => 105, "blue" => 105);
		$this->colors["dimgrey"] = array("red" => 105, "green" => 105, "blue" => 105);
		$this->colors["dodgerblue"] = array("red" => 30, "green" => 144, "blue" => 255);
		$this->colors["firebrick"] = array("red" => 178, "green" => 34, "blue" => 34);
		$this->colors["floralwhite"] = array("red" => 255, "green" => 250, "blue" => 240);
		$this->colors["forestgreen"] = array("red" => 34, "green" => 139, "blue" => 34);
		$this->colors["fuchsia"] = array("red" => 255, "green" => 0, "blue" => 255);
		$this->colors["gainsboro"] = array("red" => 220, "green" => 220, "blue" => 220);
		$this->colors["ghostwhite"] = array("red" => 248, "green" => 248, "blue" => 255);
		$this->colors["gold"] = array("red" => 255, "green" => 215, "blue" => 0);
		$this->colors["goldenrod"] = array("red" => 218, "green" => 165, "blue" => 32);
		$this->colors["gray"] = array("red" => 128, "green" => 128, "blue" => 128);
		$this->colors["grey"] = array("red" => 128, "green" => 128, "blue" => 128);
		$this->colors["green"] = array("red" => 0, "green" => 128, "blue" => 0);
		$this->colors["greenyellow"] = array("red" => 173, "green" => 255, "blue" => 47);
		$this->colors["honeydew"] = array("red" => 240, "green" => 255, "blue" => 240);
		$this->colors["hotpink"] = array("red" => 255, "green" => 105, "blue" => 180);
		$this->colors["indianred"] = array("red" => 205, "green" => 92, "blue" => 92);
		$this->colors["indigo"] = array("red" => 75, "green" => 0, "blue" => 130);
		$this->colors["ivory"] = array("red" => 255, "green" => 255, "blue" => 240);
		$this->colors["khaki"] = array("red" => 240, "green" => 230, "blue" => 140);
		$this->colors["lavender"] = array("red" => 230, "green" => 230, "blue" => 250);
		$this->colors["lavenderblush"] = array("red" => 255, "green" => 240, "blue" => 245);
		$this->colors["lawngreen"] = array("red" => 124, "green" => 252, "blue" => 0);
		$this->colors["lemonchiffon"] = array("red" => 255, "green" => 250, "blue" => 205);
		$this->colors["lightblue"] = array("red" => 173, "green" => 216, "blue" => 230);
		$this->colors["lightcoral"] = array("red" => 240, "green" => 128, "blue" => 128);
		$this->colors["lightcyan"] = array("red" => 224, "green" => 255, "blue" => 255);
		$this->colors["lightgoldenrodyellow"] = array("red" => 250, "green" => 250, "blue" => 210);
		$this->colors["lightgray"] = array("red" => 211, "green" => 211, "blue" => 211);
		$this->colors["lightgrey"] = array("red" => 211, "green" => 211, "blue" => 211);
		$this->colors["lightgreen"] = array("red" => 144, "green" => 238, "blue" => 144);
		$this->colors["lightpink"] = array("red" => 255, "green" => 182, "blue" => 193);
		$this->colors["lightsalmon"] = array("red" => 255, "green" => 160, "blue" => 122);
		$this->colors["lightseagreen"] = array("red" => 32, "green" => 178, "blue" => 170);
		$this->colors["lightskyblue"] = array("red" => 135, "green" => 206, "blue" => 250);
		$this->colors["lightslategray"] = array("red" => 119, "green" => 136, "blue" => 153);
		$this->colors["lightslategrey"] = array("red" => 119, "green" => 136, "blue" => 153);
		$this->colors["lightsteelblue"] = array("red" => 176, "green" => 196, "blue" => 222);
		$this->colors["lightyellow"] = array("red" => 255, "green" => 255, "blue" => 224);
		$this->colors["lime"] = array("red" => 0, "green" => 255, "blue" => 0);
		$this->colors["limegreen"] = array("red" => 50, "green" => 205, "blue" => 50);
		$this->colors["linen"] = array("red" => 250, "green" => 240, "blue" => 230);
		$this->colors["magenta"] = array("red" => 255, "green" => 0, "blue" => 255);
		$this->colors["maroon"] = array("red" => 128, "green" => 0, "blue" => 0);
		$this->colors["mediumaquamarine"] = array("red" => 102, "green" => 205, "blue" => 170);
		$this->colors["mediumblue"] = array("red" => 0, "green" => 0, "blue" => 205);
		$this->colors["mediumorchid"] = array("red" => 186, "green" => 85, "blue" => 211);
		$this->colors["mediumpurple"] = array("red" => 147, "green" => 112, "blue" => 219);
		$this->colors["mediumseagreen"] = array("red" => 60, "green" => 179, "blue" => 113);
		$this->colors["mediumslateblue"] = array("red" => 123, "green" => 104, "blue" => 238);
		$this->colors["mediumspringgreen"] = array("red" => 0, "green" => 250, "blue" => 154);
		$this->colors["mediumturquoise"] = array("red" => 72, "green" => 209, "blue" => 204);
		$this->colors["mediumvioletred"] = array("red" => 199, "green" => 21, "blue" => 133);
		$this->colors["midnightblue"] = array("red" => 25, "green" => 25, "blue" => 112);
		$this->colors["mintcream"] = array("red" => 245, "green" => 255, "blue" => 250);
		$this->colors["mistyrose"] = array("red" => 255, "green" => 228, "blue" => 225);
		$this->colors["moccasin"] = array("red" => 255, "green" => 228, "blue" => 181);
		$this->colors["navajowhite"] = array("red" => 255, "green" => 222, "blue" => 173);
		$this->colors["navy"] = array("red" => 0, "green" => 0, "blue" => 128);
		$this->colors["oldlace"] = array("red" => 253, "green" => 245, "blue" => 230);
		$this->colors["olive"] = array("red" => 128, "green" => 128, "blue" => 0);
		$this->colors["olivedrab"] = array("red" => 107, "green" => 142, "blue" => 35);
		$this->colors["orange"] = array("red" => 255, "green" => 165, "blue" => 0);
		$this->colors["orangered"] = array("red" => 255, "green" => 69, "blue" => 0);
		$this->colors["orchid"] = array("red" => 218, "green" => 112, "blue" => 214);
		$this->colors["palegoldenrod"] = array("red" => 238, "green" => 232, "blue" => 170);
		$this->colors["palegreen"] = array("red" => 152, "green" => 251, "blue" => 152);
		$this->colors["paleturquoise"] = array("red" => 175, "green" => 238, "blue" => 238);
		$this->colors["palevioletred"] = array("red" => 219, "green" => 112, "blue" => 147);
		$this->colors["papayawhip"] = array("red" => 255, "green" => 239, "blue" => 213);
		$this->colors["peachpuff"] = array("red" => 255, "green" => 218, "blue" => 185);
		$this->colors["peru"] = array("red" => 205, "green" => 133, "blue" => 63);
		$this->colors["pink"] = array("red" => 255, "green" => 192, "blue" => 203);
		$this->colors["plum"] = array("red" => 221, "green" => 160, "blue" => 221);
		$this->colors["powderblue"] = array("red" => 176, "green" => 224, "blue" => 230);
		$this->colors["purple"] = array("red" => 128, "green" => 0, "blue" => 128);
		$this->colors["rebeccapurple"] = array("red" => 102, "green" => 51, "blue" => 153);
		$this->colors["red"] = array("red" => 255, "green" => 0, "blue" => 0);
		$this->colors["rosybrown"] = array("red" => 188, "green" => 143, "blue" => 143);
		$this->colors["royalblue"] = array("red" => 65, "green" => 105, "blue" => 225);
		$this->colors["saddlebrown"] = array("red" => 139, "green" => 69, "blue" => 19);
		$this->colors["salmon"] = array("red" => 250, "green" => 128, "blue" => 114);
		$this->colors["sandybrown"] = array("red" => 244, "green" => 164, "blue" => 96);
		$this->colors["seagreen"] = array("red" => 46, "green" => 139, "blue" => 87);
		$this->colors["seashell"] = array("red" => 255, "green" => 245, "blue" => 238);
		$this->colors["sienna"] = array("red" => 160, "green" => 82, "blue" => 45);
		$this->colors["silver"] = array("red" => 192, "green" => 192, "blue" => 192);
		$this->colors["skyblue"] = array("red" => 135, "green" => 206, "blue" => 235);
		$this->colors["slateblue"] = array("red" => 106, "green" => 90, "blue" => 205);
		$this->colors["slategray"] = array("red" => 112, "green" => 128, "blue" => 144);
		$this->colors["slategrey"] = array("red" => 112, "green" => 128, "blue" => 144);
		$this->colors["snow"] = array("red" => 255, "green" => 250, "blue" => 250);
		$this->colors["springgreen"] = array("red" => 0, "green" => 255, "blue" => 127);
		$this->colors["steelblue"] = array("red" => 70, "green" => 130, "blue" => 180);
		$this->colors["tan"] = array("red" => 210, "green" => 180, "blue" => 140);
		$this->colors["teal"] = array("red" => 0, "green" => 128, "blue" => 128);
		$this->colors["thistle"] = array("red" => 216, "green" => 191, "blue" => 216);
		$this->colors["tomato"] = array("red" => 255, "green" => 99, "blue" => 71);
		$this->colors["turquoise"] = array("red" => 64, "green" => 224, "blue" => 208);
		$this->colors["violet"] = array("red" => 238, "green" => 130, "blue" => 238);
		$this->colors["wheat"] = array("red" => 245, "green" => 222, "blue" => 179);
		$this->colors["white"] = array("red" => 255, "green" => 255, "blue" => 255);
		$this->colors["whitesmoke"] = array("red" => 245, "green" => 245, "blue" => 245);
		$this->colors["yellow"] = array("red" => 255, "green" => 255, "blue" => 0);
	}

	/* Expect any of the following 4 kind of parameters:
	 * a) color name
	 * b) 1,2,3 (corresponds to RGB)
	 * c) rgb:1,2,3
	 * d) hsb:0.1,0.2,0.3
	 */
	public function setColor($color)
	{
		$parts = explode(":", $color);

		if (count($parts) == 0)
		{
			// Parameter not received
			return false;
		}

		if (count($parts) == 1)
		{
			// Option a) or b)
			$color = explode(",", $parts[0]);
			if (count($color) == 1)
			{
				// Option a)
				$color = strtolower($color[0]);
				if ($this->isValidColor($color))
				{
					return $this->setRGB($this->colors[$color]["red"],
							     $this->colors[$color]["green"],
							     $this->colors[$color]["blue"]);
				}
			} else {
				// Option b)
				return $this->setRGB((int)$color[0],
						     (int)$color[1],
						     (int)$color[2]);
			}
		}

		$color = explode(",", $parts[1]);

		if (count($parts) == 2 && count($color) == 3)
		{
			// Option c) or d)
			switch ($parts[0])
			{
				// Option c)
				case "rgb":
					return $this->setRGB((int)$color[0],
							     (int)$color[1],
							     (int)$color[2]);
					break;
				// Option d)
				case "hsb":
					return $this->setHSB((float)$color[0],
							     (float)$color[1],
							     (float)$color[2]);
					break;
				default:
					return false;
					break;
			}
		}

		return false;
	}

	public function isValidColor($color)
	{
		return array_key_exists(strtolower($color), $this->colors);
	}

	public function getLifxColorString()
	{
		$LifxColorString =  "hue:" . round(360 * $this->hue, 2);
		$LifxColorString .= " saturation:" . round($this->saturation, 2);
		$LifxColorString .= " brightness:" . round($this->brightness, 2);
		return $LifxColorString;
	}

	public function getWinkColorString()
	{
		$WinkColorString  = str_pad(dechex($this->red),   2, "0", STR_PAD_LEFT);
		$WinkColorString .= str_pad(dechex($this->green), 2, "0", STR_PAD_LEFT);
		$WinkColorString .= str_pad(dechex($this->blue),  2, "0", STR_PAD_LEFT);
		return $WinkColorString;
	}

	public function setRGB($r, $g, $b)
	{
		if (is_int($r) && is_int($g) && is_int($b))
		{
			$this->red = $r;
			$this->green = $g;
			$this->blue = $b;
			$HSB = Color::RGBtoHSB($r, $g, $b);
			$this->hue = $HSB["hue"];
			$this->saturation = $HSB["saturation"];
			$this->brightness = $HSB["brightness"];
			return true;
		}
		return false;
	}

	public function getRGB()
	{
		return array("red" => ($this->red),
			     "green" => ($this->green),
			     "blue" => ($this->blue));
	}

	public function setHSB($h, $s, $b)
	{
		if (is_float($h) && is_float($s) && is_float($b))
		{
			$this->hue = $h;
			$this->saturation = $s;
			$this->brightness = $b;
			$RGB = Color::HSBtoRGB($h, $s, $b);
			$this->red = $RGB["red"];
			$this->green = $RGB["green"];
			$this->blue = $RGB["blue"];
			return true;
		}
		return false;
	}


	public function getHSB()
	{
		return array("hue" => ($this->hue),
			     "saturation" => ($this->saturation),
			     "brightness" => ($this->brightness));
	}

	/* Converts RGB values to HSB model value
	 * Red (r), Green (g), Blue(b) valid range 0 to 255
	 */
	public static function RGBtoHSB($r, $g, $b)
	{
		$hue = 0.0;
		$saturation = 0.0;
		$brightness = 0.0;
		$hsbvals = array("hue" => 0.0,
				 "saturation" => 0.0,
				 "brightness" => 0.0);

		// $cmax = max($r, $g, $b);
		$cmax = ($r > $g) ? $r : $g;
		if ($b > $cmax)
		{
			$cmax = $b;
		}

		// $cmin = min($r, $g, $b);
		$cmin = ($r < $g) ? $r : $g;
		if ($b < $cmin)
		{
			$cmin = $b;
		}

		$brightness = ((float) $cmax) / 255.0;

		$saturation = 0;
		$hue = 0;
		if ($cmax != 0)
		{
			$saturation = ((float) ($cmax - $cmin)) / ((float) $cmax);

			$redc = ((float) ($cmax - $r)) / ((float) ($cmax - $cmin));
			$greenc = ((float) ($cmax - $g)) / ((float) ($cmax - $cmin));
			$bluec = ((float) ($cmax - $b)) / ((float) ($cmax - $cmin));

			// what is $r == $g == cmax?
			if ($r == $cmax)
			{
				$hue = $bluec - $greenc;
			} else if ($g == $cmax)
			{
				$hue = 2.0 + $redc - $bluec;
			} else {
				$hue = 4.0 + $greenc - $redc;
			}

			$hue = $hue / 6.0;
			if ($hue < 0)
			{
				$hue = $hue + 1.0;
			}
		}

		$hsbvals["hue"] = $hue;
		$hsbvals["saturation"] = $saturation;
		$hsbvals["brightness"] = $brightness;
		return $hsbvals;
	}


	/* Converts HSB values to RGB values
	 * Hue range 0 to 1.0	(0°-360° normalized to 1.0)
	 * Saturation 0 to 1.0 (0%-100% normalized to 1.0)
	 * Brightness 0 to 1.0 (0%-100% normalized to 1.0)
	 */
	public static function HSBtoRGB($hue, $saturation, $brightness)
	{
		$r = 0;
		$g = 0;
		$b = 0;

		if ($saturation == 0)
		{
			$r = $g = $b = (int) ($brightness * 255.0 + 0.5);
		} else {
			$h = ($hue - (float)floor($hue)) * 6.0;
			$f = $h - (float)floor($h);
			$p = $brightness * (1.0 - $saturation);
			$q = $brightness * (1.0 - $saturation * $f);
			$t = $brightness * (1.0 - ($saturation * (1.0 - $f)));
			switch ((int) $h)
			{
				case 0:
					$r = (int) ($brightness * 255.0 + 0.5);
					$g = (int) ($t * 255.0 + 0.5);
					$b = (int) ($p * 255.0 + 0.5);
					break;
				case 1:
					$r = (int) ($q * 255.0 + 0.5);
					$g = (int) ($brightness * 255.0 + 0.5);
					$b = (int) ($p * 255.0 + 0.5);
					break;
				case 2:
					$r = (int) ($p * 255.0 + 0.5);
					$g = (int) ($brightness * 255.0 + 0.5);
					$b = (int) ($t * 255.0 + 0.5);
					break;
				case 3:
					$r = (int) ($p * 255.0 + 0.5);
					$g = (int) ($q * 255.0 + 0.5);
					$b = (int) ($brightness * 255.0 + 0.5);
					break;
				case 4:
					$r = (int) ($t * 255.0 + 0.5);
					$g = (int) ($p * 255.0 + 0.5);
					$b = (int) ($brightness * 255.0 + 0.5);
					break;
				case 5:
					$r = (int) ($brightness * 255.0 + 0.5);
					$g = (int) ($p * 255.0 + 0.5);
					$b = (int) ($q * 255.0 + 0.5);
					break;
			}
		}

		return array("red" => $r, "green" => $g, "blue" => $b);
	}
}

?>
