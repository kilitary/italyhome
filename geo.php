<?php

class Geo
{
    static function pointInPolygon($point, $polygon, $pointOnVertex = true)
    {

        // Transform string coordinates into arrays with x and y values
        $point = Geo::pointStringToCoordinates($point);
        $vertices = [];
        foreach($polygon as $vertex) {
            $vertices[] = Geo::pointStringToCoordinates($vertex);
        }

        // Check if the point sits exactly on a vertex
        if($pointOnVertex == true and Geo::pointOnVertex($point, $vertices) == true) {
            return true;
        }

        // Check if the point is inside the polygon or on the boundary
        $intersections = 0;
        $vertices_count = count($vertices);

        for($i = 1; $i < $vertices_count; $i++) {
            $vertex1 = $vertices[$i - 1];
            $vertex2 = $vertices[$i];
            if($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
                return false;
            }
            if($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) {
                $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x'];
                if($xinters == $point['x']) { // Check if point is on the polygon boundary (other than horizontal)
                    return false;
                }
                if($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                    $intersections++;
                }
            }
        }
        // If the number of edges we passed through is odd, then it's in the polygon.
        if($intersections % 2 != 0) {
            return true;
        } else {
            return false;
        }
    }

    static function pointOnVertex($point, $vertices)
    {
        foreach($vertices as $vertex) {
            if($point == $vertex) {
                return true;
            }
        }

    }

    static function pointStringToCoordinates($pointString)
    {
        $coordinates = $pointString;
        return ["y" => $coordinates[0], "x" => $coordinates[1]];
    }

}