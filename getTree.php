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
  $initOnload = (isset($req['i'])) ? true : false;
  $relation = (isset($req['p'])) ? 'property='.$req['p'] : NULL;
  $category = (isset($req['c'])) ? 'category='.$req['c'] : NULL;
  $start = (isset($req['s'])) ? 'start='.$req['s'] : NULL;
  $display = (isset($req['d'])) ? 'display='.$req['d'] : NULL;
  $condition = (isset($req['q'])) ? 'condition='.$req['q'] : NULL;
  $urlparams = (isset($req['u'])) ? 'urlparams='.$req['u'] : NULL;
  
  // the following parameter depend on initOnload,
  // if this is not set, these are not needed because an dynamic expansion will fetch
  // the next level only. If the whole tree (or part of it) is loaded for the first time
  // we need to check these parameter as well and treat them accordingly 
  
  // fetch one depth only if ajax expansion
  $maxDepth = ($initOnload) ? (isset($req['m']) ? 'maxDepth='.$req['m'] : NULL ) : 'maxDepth=1';
  // these are not needed for the next level on dynamic expansion
  $redirectPage = ($initOnload && isset($req['r'])) ? 'redirectPage='.$req['r'] : NULL;
  $level = ($initOnload && isset($req['l'])) ? 'level='.$req['l'] : NULL;
  $opento = ($initOnload && isset($req['o'])) ? 'opento='.$req['o'] : NULL;
  
  $treeGenerator = new TreeGenerator;
  $treeGenerator->setJson();
  $res= $treeGenerator->generateTree($wgParser, $relation, $category,
                                     $start, $display, $maxDepth, $redirectPage, $level, $condition, $urlparams, $opento);
  
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