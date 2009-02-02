<?php

/**
 * Provides functionality to get partial trees in treeview
 * by an ajax request. One level only starting at a certain
 * node (given in parameter start) is fetched. Therefore
 * some of the parameters for the generic generateTree()
 * function are not needed or can be set to a certain value. 
 */

$wgAjaxExportList[] = 'smw_treeview_getTree';

function smw_treeview_getTree($input) {
  global $wgParser;

  parse_str($input, $req);
  $relation = (isset($req['p'])) ? 'property='.$req['p'] : NULL;
  $category = NULL;
  $start = (isset($req['s'])) ? 'start='.$req['s'] : NULL;
  $display = (isset($req['d'])) ? 'display='.$req['d'] : NULL;
  $maxDepth = 1;
  $redirectPage = NULL;
  $level = NULL;
  
  $treeGenerator = new TreeGenerator;
  $treeGenerator->setJson();
  $res= $treeGenerator->generateTree($wgParser, $relation, $category,
                                     $start, $display, $maxDepth, $redirectPage, $level);
  
  $return['treelist'] = $res;
  $return['result'] = 'success';
  if (isset($req['t'])) $return['token']= $req['t'];
 
  // output correct header
  $xhr = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
              (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
  header('Content-Type: ' . ($xhr ? 'application/json' : 'text/plain')); 
  echo json_encode($return);
  
  return "";
}

?>