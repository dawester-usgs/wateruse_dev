
/*******************
 *** HTML begins ***
 *******************/

printf("Content-type:text/html\n\n");
printf("<html><head><title>Modify Measurement Point Information</title>\n");
printf("<link rel=\"stylesheet\" type=\"text/css\" href=\"%s/styles.css\">\n",pathfile);

/***********************
 ** JavaScript Begins **
 ***********************/
printf("<script type=\"text/javascript\">\n");

printf(" function stream(sent)\n{ \n");
printf("if (sent != \"all\") \n return;\n");
printf(" stream_name = prompt(\"Enter Stream Name to Add to List: \\nOnly first 15 characters will be used \",\"UNKNOWN\"); \n");
printf(" stream_name = stream_name.substr(0,15); \n");
printf(" stream_name = stream_name.toUpperCase(); \n");
printf(" document.form3.stream_nm.options.length = 0; \n");
printf(" document.form3.stream_nm.options[0] = null; \n");
printf(" document.form3.stream_nm.options[0] = new Option (stream_name,stream_name); \n");

 for (i = 0; i < no_streams; i++)
   {
   printf("document.form3.stream_nm.options[%d] = null; \n",i+1);
   printf(" document.form3.stream_nm.options[%d] = new Option ('%s','%s');\n",i+1,county_water_src[i].stream_nm,county_water_src[i].stream_nm);
   }

printf(" document.form3.stream_nm.options[%d] = null; \n",i+1);
printf(" document.form3.stream_nm.options[%d] = new Option ('ADD NAME TO LIST','all'); \n",i+1);
printf(" document.form3.stream_nm.options[0].selected = true; \n } \n");

printf(" function drill(sent)\n{ \n");
printf("if (sent != \"all\") \n return;\n");
printf(" driller_name = prompt(\"Enter Driller's Name to Add to List: \\nOnly first 25 characters will be used \",\"UNKNOWN\"); \n");
printf(" driller_name = driller_name.substr(0,25); \n");
printf(" driller_name = driller_name.toUpperCase(); \n");
printf(" document.form3.driller_nm.options.length = 0; \n");
printf(" document.form3.driller_nm.options[0] = null; \n");
printf(" document.form3.driller_nm.options[0] = new Option (driller_name,driller_name); \n");

 for (i = 1; i < no_drillers; i++)
   {
   printf("document.form3.driller_nm.options[%d] = null; \n",i+1);
   printf(" document.form3.driller_nm.options[%d] = new Option (\"%s\",\"%s\");\n",i+1,cnst_driller[i].name,cnst_driller[i].name);
   }

printf(" document.form3.driller_nm.options[%d] = null; \n",i+1);
printf(" document.form3.driller_nm.options[%d] = new Option ('ADD NAME TO LIST','all'); \n",i+1);
printf(" document.form3.driller_nm.options[0].selected = true; \n } \n");



printf(" function aquifer_min(sent)\n{ \n");
printf("  if (sent == \"all\")  { \n");
printf(" document.form3.prin_aquifer.options.length = 0; \n");
printf(" document.form3.prin_aquifer.options[0] = null; \n");
printf(" document.form3.prin_aquifer.options[0] = new Option ('%s','%s'); \n",stations.prin_aquifer,stations.prin_aquifer);
printf(" document.form3.prin_aquifer.options[1] = null; \n");
printf(" document.form3.prin_aquifer.options[1] = new Option ('UNKNOWN','UNKNOWN'); \n");
    for (i=0;i<aquifer_all_count; i++)
        {
        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+2);
        printf(" document.form3.prin_aquifer.options[%d] = new Option ('%s- %s','%s'); \n",i+2,aquifer[i].aquifer_cd,aquifer[i].aquifer_nm,aquifer[i].aquifer_cd);
        }
        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+2);
        printf(" document.form3.prin_aquifer.options[%d] = new Option ('AQUIFERS IN MY COUNTY ONLY','one');  \n",i+1);
        printf(" document.form3.prin_aquifer.options[0].selected = true; \n } \n");

printf("  if (sent == \"one\")  { \n");
printf(" document.form3.prin_aquifer.options.length = 0; \n");
printf(" document.form3.prin_aquifer.options[0] = null; \n");
printf(" document.form3.prin_aquifer.options[0] = new Option ('%s','%s'); \n",stations.prin_aquifer,stations.prin_aquifer);
printf(" document.form3.prin_aquifer.options[1] = null; \n");
printf(" document.form3.prin_aquifer.options[1] = new Option ('UNKNOWN','UNKNOWN'); \n");
printf(" document.form3.prin_aquifer.options[2] = null; \n");
printf(" document.form3.prin_aquifer.options[2] = new Option ('N/A','N/A'); \n");
for (i=0;i<aquifer_one_count; i++)
        {
        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+3);
        printf(" document.form3.prin_aquifer.options[%d] = new Option ('%s - %s','%s'); \n",i+3,aquifer_county[i].aquifer_cd,aquifer_county[i].aquifer_nm,aquifer_county[i].aquifer_cd);
        }
        printf(" document.form3.prin_aquifer.options[%d] = null; \n",i+3);
        printf(" document.form3.prin_aquifer.options[%d] = new Option ('SHOW ALL AQUIFERS','all'); \n",i+3);
        printf(" document.form3.prin_aquifer.options[0].selected = true; \n } \n");

printf("} \n");

printf("function validate5(form5,what)\n { \n");

printf("la = parseFloat(document.form3.latitude.value);\n");
printf("lo = parseFloat(document.form3.longitude.value);\n");
printf("document.form5.latitude.value = document.form3.latitude.value;\n");
printf("document.form5.longitude.value = document.form3.longitude.value;\n");
printf("\n");
printf("if ((la>363500) || (la<310000) || (isNaN(la))  \n");
printf(" || (lo>945000) || (lo<893701) || (isNaN(lo)) )\n");
printf("   alert(\"The latitude and longitude are outside of the state.\" + lo +\"   \"+ la);\n");
printf("else { \n");
printf("   lat1   = parseFloat(document.form5.latitude.value.charAt(0));\n");
printf("   lat2   = parseFloat(document.form5.latitude.value.charAt(1));\n");
printf("   lat3   = parseFloat(document.form5.latitude.value.charAt(2));\n");
printf("   lat4   = parseFloat(document.form5.latitude.value.charAt(3));\n");
printf("   lat5   = parseFloat(document.form5.latitude.value.charAt(4));\n");
printf("   lat6   = parseFloat(document.form5.latitude.value.charAt(5));\n");
printf("   dd_lat = (lat1*10+lat2+lat3/6+lat4/60+lat5/360+lat6/3600);\n");
printf("  if (document.form3.longitude.value.charAt(0) != \"0\") {\n");
printf("   lon1   = parseFloat(document.form5.longitude.value.charAt(0));\n");
printf("   lon2   = parseFloat(document.form5.longitude.value.charAt(1));\n");
printf("   lon3   = parseFloat(document.form5.longitude.value.charAt(2));\n");
printf("   lon4   = parseFloat(document.form5.longitude.value.charAt(3));\n");
printf("   lon5   = parseFloat(document.form5.longitude.value.charAt(4));\n");
printf("   lon6   = parseFloat(document.form5.longitude.value.charAt(5));\n");
printf("   dd_lon = lon1*10+lon2+lon3/6+lon4/60+lon5/360+lon6/3600;\n } \n");
printf("  else { \n");
printf("   lon1   = parseFloat(document.form5.longitude.value.charAt(1));\n");
printf("   lon2   = parseFloat(document.form5.longitude.value.charAt(2));\n");
printf("   lon3   = parseFloat(document.form5.longitude.value.charAt(3));\n");
printf("   lon4   = parseFloat(document.form5.longitude.value.charAt(4));\n");
printf("   lon5   = parseFloat(document.form5.longitude.value.charAt(5));\n");
printf("   lon6   = parseFloat(document.form5.longitude.value.charAt(6));\n");
printf("   dd_lon = lon1*10+lon2+lon3/6+lon4/60+lon5/360+lon6/3600;\n } \n");
printf("   document.form5.map_well_feature_points.value = \"-\"+dd_lon+\" \"+dd_lat;\n");
printf("    }  \n");

printf("  if (what == \"aquifer\")  {	\n");
printf("   document.form5.action = \"%s/MAPS/aquifer_det.phtml\";\n",pathfile);
printf("   document.form5.map_well_feature_points.value = document.form3.well_depth.value;\n");
printf("   document.form5.map_well_feature_points.name  = \"well_depth\";\n");
printf("   document.form5.map_well_projection.value = document.form3.prin_aquifer.value;\n");
printf("   document.form5.map_well_projection.name  = \"prin_aquifer\";\n } \n \n");
printf("document.form5.submit(); \n }	\n");

printf(" function validate(form3) { \n");

printf(" if (\"  \" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value) { \n") ;
printf(" alert(\"Action Code is a required field!\");  \n");
printf("document.form3.action_cd.focus(); \n");
printf(" return (false);         } \n");

printf(" else if (\"  \" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value) { \n") ;
printf(" alert(\"Source Type is a required field !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if (\"\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value) { \n") ;
printf(" alert(\"Source Type is a required field!\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ((\"GW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
printf(" && (\"RL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ((\"SW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
printf(" && (\"RL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ((\"FW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
printf(" && (\"RL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ((\"TW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
printf(" && (\"WD\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ((\"GW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
printf(" && (\"DL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ((\"SW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
printf(" && (\"DL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ((\"FW\" == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)  ");
printf(" && (\"DL\" == document.form3.action_cd.options[document.form3.action_cd.selectedIndex].value)) { \n") ;
printf(" alert(\"Source Type and Action Code are incompatible !\");  \n");
printf("document.form3.source_type.focus(); \n");
printf(" return (false);         } \n");

printf(" else if ( (\"N/A\"  == document.form3.stream_nm.options[document.form3.stream_nm.selectedIndex].value) && \n");
printf("     (\"SW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)){\n");
printf(" alert(\"Please select a Water Source !\");  \n");
printf("document.form3.stream_nm.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.well_depth.value.charAt(0)) && ");
printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Well Depth is a required field !\");  \n");
printf("document.form3.well_depth.focus(); \n");
printf(" return (false);                } \n");

printf("else if ((\"\"  == document.form3.well_depth.value.charAt(0)) && ");
printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Well Depth is a required field !\");  \n");
printf("document.form3.well_depth.focus(); \n");
printf(" return (false);                } \n");


printf(" else if ((\" \" == document.form3.driller_nm.value.charAt(0)) && ");
printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Driller Name is a required field!\");  \n");
printf("document.form3.driller_nm.focus(); \n");
printf(" return (false);                } \n");


printf("else if ((\"\"  == document.form3.driller_nm.value.charAt(0)) && \n");
printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Driller Name is a required field!\");  \n");
printf("document.form3.driller_nm.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.date_drilled.value.charAt(0)) && ");
printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Drill Date is a required field!\");  \n");
printf("document.form3.date_drilled.focus(); \n");
printf(" return (false);                } \n");

printf("else if ((\"\"  == document.form3.date_drilled.value.charAt(0)) && \n");
printf("     (\"GW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Drill Date is a required field!\");  \n");
printf("document.form3.date_drilled.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.date_drilled.value.charAt(0)) && ");
printf("     (\"SW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Drill Date is a required field!\");  \n");
printf("document.form3.date_drilled.focus(); \n");
printf(" return (false);                } \n");

printf("else if ((\"\"  == document.form3.date_drilled.value.charAt(0)) && \n");
printf("     (\"SW\"  == document.form3.source_type.options[document.form3.source_type.selectedIndex].value)) {\n");
printf(" alert(\"Drill Date is a required field!\");  \n");
printf("document.form3.date_drilled.focus(); \n");
printf(" return (false);                } \n");


printf(" else if (\"\"  == document.form3.huc.options[document.form3.huc.selectedIndex].value) {\n");
printf(" alert(\"HUC is a required field !\");  \n");
printf("document.form3.huc.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\"\"  == document.form3.quad1.options[document.form3.quad1.selectedIndex].value) || \n");
printf("         (\"--\" == document.form3.quad1.options[document.form3.quad1.selectedIndex].value)) { \n");
printf(" alert(\"Quad is a required field !\");  \n");
printf("document.form3.quad1.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\"\"  == document.form3.quad2.options[document.form3.quad2.selectedIndex].value) || \n");
printf("         (\"--\" == document.form3.quad2.options[document.form3.quad2.selectedIndex].value)) { \n");
printf(" alert(\"Quad is a required field!\");  \n");
printf("document.form3.quad2.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.section.value.charAt(0) ) || ");
printf("     (\"\"  == document.form3.section.value.charAt(0))) {\n");
printf(" alert(\"Section is a required field !\");  \n");
printf("document.form3.section.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.township.value.charAt(0) ) || ");
printf("     (\"\"  == document.form3.township.value.charAt(0))) {\n");
printf(" alert(\"Township is a required field!\");  \n");
printf("document.form3.township.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.range.value.charAt(0) ) || ");
printf("     (\"\"  == document.form3.range.value.charAt(0))) {\n");
printf(" alert(\"Range is a required field!\");  \n");
printf("document.form3.range.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.altitude.value.charAt(0) ) || ");
printf("     (\"\"  == document.form3.altitude.value.charAt(0))) {\n");
printf(" alert(\"Altitude is a required field !\");  \n");
printf("document.form3.altitude.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.pump_hp.value.charAt(0) ) || ");
printf("     (\"\"  == document.form3.pump_hp.value.charAt(0))) {\n");
printf(" alert(\"Pump Horsepower is a required field!\");  \n");
printf("document.form3.pump_hp.focus(); \n");
printf(" return (false);                } \n");

printf(" else if ((\" \" == document.form3.pipe_diam.value.charAt(0)) || ");
printf("     (\"\"  == document.form3.pipe_diam.value.charAt(0))) {\n");
printf(" alert(\"Pipe Diameter is a required field!\");  \n");
printf("document.form3.pipe_diam.focus(); \n");
printf(" return (false);                } \n");

printf(" else if (\"\"  == document.form3.power_tp.options[document.form3.power_tp.selectedIndex].value) { \n");
printf(" alert(\"Power Type is a required field!\");  \n");
printf("document.form3.power_tp.focus(); \n");
printf(" return (false);                } \n");

printf(" else if (\"\"  == document.form3.diversion_meth.options[document.form3.diversion_meth.selectedIndex].value) { \n");
printf(" alert(\"Pump Type is a required field!\");  \n");
printf("document.form3.diversion_meth.focus(); \n");
printf(" return (false);                } \n");

printf("else \n return (true); \n  } \n \n");
printf("</script></head>\n");
printf("<body onload=\"document.form3.reset();document.form3.local_desc.focus();\"><center>\n");

printf("<h3><hr>Modify Measurement Point<hr></h3>\n");
printf("<table border=\"1\">\n");
printf("<tr><th colspan=\"3\">\n");
printf("Measurement Point Information<br>( %s )\n",mpid);
printf("<form method=\"get\" name=\"form1\" action=\"%s\">\n",program);
printf("<input type=\"hidden\" value=\"change_mod_mpi_ownersearch\" name=\"control\">\n");
printf("<input type=\"hidden\" value=\"%d\" name=owner_id>\n",stations.owner_id);
printf("<input type=\"hidden\" value=\"%d\" name=diverter_id>\n",stations.diverter_id);
printf("<input type=\"hidden\" value=\"%s\" name=mpid>\n",stations.mpid);
printf("<input type=\"hidden\" value=\"%d\" name=facility_id>\n",stations.facility_id);
printf("<input type=\"hidden\" value=\"%s\" name=idtype>\n",idtype);
printf("</th></tr><tr><td class=\"regc\">Owner: %s (%d) \n",owner_nm,stations.owner_id);
printf("<br><input type=\"submit\" value=\"Change Owner\"></form></td>");

printf("<form method=\"get\" name=\"form2\" action=\"%s\">\n",program);
printf("<input type=\"hidden\" value=\"change_mod_mpi_divertersearch\" name=\"control\">\n");
printf("<input type=\"hidden\" value=\"%d\" name=\"owner_id\">\n",stations.owner_id);
printf("<input type=\"hidden\" value=\"%d\" name=\"diverter_id\">\n",stations.diverter_id);
printf("<input type=\"hidden\" value=\"%s\" name=\"mpid\">\n",stations.mpid);
printf("<input type=\"hidden\" value=\"%d\" name=\"facility_id\">\n",stations.facility_id);
printf("<input type=\"hidden\" value=\"%s\" name=\"idtype\">\n",idtype);
printf("</td><td class=\"regc\">Diverter: %s (%d) \n",diverter_nm,stations.diverter_id);
printf("<br><input type=\"submit\" value=\"Change Diverter\"></form></td>");

printf("<form method=\"get\" name=\"form4\" action=\"%s\">\n",program);
printf("<input type=\"hidden\" value=\"change_mod_mpi_facilitysearch\" name=\"control\">\n");
printf("<input type=\"hidden\" value=\"%d\" name=\"owner_id\">\n",stations.owner_id);
printf("<input type=\"hidden\" value=\"%d\" name=\"diverter_id\">\n",stations.diverter_id);
printf("<input type=\"hidden\" value=\"%s\" name=\"mpid\">\n",stations.mpid);
printf("<input type=\"hidden\" value=\"%d\" name=\"facility_id\">\n",stations.facility_id);
printf("<input type=\"hidden\" value=\"%s\" name=\"idtype\">\n",idtype);
printf("</td><td class=\"regc\">Facility ID: &nbsp; \n");
  if (stations.facility_id ==0)
	printf("None\n");
  else	printf("%d \n",stations.facility_id);

printf("<br><input type=\"submit\" value=\"Change Facility\"></form></td></tr>");
printf("<form method=\"get\" name=\"form3\" action=\"%s\" onSubmit=\"return validate(form3)\">\n",program);
printf("<input type=\"hidden\" value=\"update_mpid\" name=\"control\">\n");
if (strcmp(wyear,"") !=0)
printf("<input type=\"hidden\" value=\"%s\" name=\"wyear\">\n",wyear);
printf("<input type=\"hidden\" value=\"%d\" name=\"owner_id\">\n",stations.owner_id);
printf("<input type=\"hidden\" value=\"%d\" name=\"diverter_id\">\n",stations.diverter_id);
printf("<input type=\"hidden\" value=\"%d\" name=\"facility_id\">\n",stations.facility_id);
printf("<input type=\"hidden\" value=\"%s\" name=\"mpid\">\n",stations.mpid);
printf("<input type=\"hidden\" value=\"%s\" name=\"datum\">\n",datum);
printf("<input type=\"hidden\" value=\"%s\" name=\"idtype\">\n",idtype);
printf("<tr><td class=\"reg\" colspan=\"3\">Local Description: &nbsp;\n");
printf("<input type=\"text\" class=\"formatme\" onFocus=\"this.select()\"size=\"25\" name=\"local_desc\" ");
printf("value=\"%s\" maxlength=\"25\"></td></tr>\n",stations.local_desc);

printf("<tr><td class=\"val\">Action Code: &nbsp;<select name=action_cd>\n");
printf("  <option value=\"%s\" selected>%s\n",stations.action_cd,stations.action_cd);
printf("  <option value=\"AB\">Abandoned 	\n");
printf("  <option value=\"WD\">Withdrawal	\n");
printf("  <option value=\"DL\">Delivered	\n");
printf("  <option value=\"RL\">Released		\n");
printf("  <option value=\"PR\">Production	\n");
printf("  <option value=\"IA\">Inactive  	\n");
printf("  </select>\n");

printf("</td><td class=\"val\">Source (SW,GW): &nbsp; \n");
printf("	<select name=source_type> \n");
printf("	  <option value=\"%s\" selected>%s \n",stations.source_type,stations.source_type);
printf("	  <option value=\"SW\">Surface Water \n");
printf("	  <option value=\"GW\">Ground Water \n");
printf("	  <option value=\"FW\">Facility Water \n");
printf("	  <option value=\"TW\">Transferred Water \n");
printf("	  <option value=\"SP\">Spring Water \n");
printf("	</select></td>\n");
printf("<td class=\"reg\">Tract#:&nbsp;<input type=\"text\" onFocus=this.select() ");
printf("value=\"%s\" class=\"formatme\" name=\"tract\" size=\"5\" maxlength=\"5\">\n",stations.tract);
printf("&nbsp; &nbsp; Farm:&nbsp;<input type=\"text\" onFocus=\"this.select()\" size=5 ");
printf("name=\"farm\" class=\"formatme\" value=\"%s\" maxlength=\"5\"></td>\n",stations.farm);

printf("</tr><tr></td><td class=\"reg\">Quad #: &nbsp; \n");
printf("<input type=\"text\" onFocus=\"this.select();\" value=\"%s\" name=\"quadno\" \n",stations.quadno);
printf("maxlength=\"4\" size=\"4\" class=\"formatme\" ></td>\n");
printf("<td class=\"reg\">Operator #: &nbsp;<input type=\"text\" onFocus=this.select() value=\"%s\" ",stations.opnum);
printf("name=\"opnum\" size=\"5\" maxlength=\"5\" class=\"formatme\"></td>\n");
printf("</td><td class=\"reg\">Well #: &nbsp;<input type=\"text\" onFocus=\"this.select()\" value=\"%s\" ",stations.well_no);
printf("name=\"well_no\" size=\"10\" maxlength=\"10\" class=\"formatme\"> </td>\n");
printf("</tr><tr><td colspan=\"2\" class=\"val\">Surface Water Source Name: &nbsp; \n");

printf("<select name=\"stream_nm\" onChange=\"stream(document.form3.stream_nm.options[selectedIndex].value);\">\n");

printf("<option selected value=\"%s\">%s </option>\n",stations.stream_nm,stations.stream_nm);
printf("<option value=\"UNKNOWN\">UNKNOWN</option>\n",stations.stream_nm,stations.stream_nm);
printf("<option value=\"N/A\">N/A</option>\n",stations.stream_nm,stations.stream_nm);

 for (i = 0; i < no_streams; i++)
   printf("<option value=\"%s\"> %s </option>\n",county_water_src[i].stream_nm,county_water_src[i].stream_nm);

printf("<option value=\"all\">ADD NAME TO LIST</option></select></td>\n");

printf("<td class=\"val\">Dam: &nbsp; \n");
	if (strcmp(stations.dam,"Y") ==0)
		strcpy(checker,"");
printf("<input type=\"radio\" value=\"Y\" check%sed name=\"dam\">Yes\n",checker);
printf("<input type=\"radio\" value=\"N\" %s name=\"dam\">No </td></tr>\n",checker);

printf("<tr><td class=\"val\" colspan=\"3\">Aquifer Code: &nbsp;\n");
printf("<select name=\"prin_aquifer\" onChange=\"aquifer_min(document.form3.prin_aquifer.options[selectedIndex].value);\">\n");
if (strcmp(aquifer_cd,"") !=0)
	printf("<option value=\"%s\"selected >%s </option>\n",aquifer_cd,aquifer_cd);
printf("<option value=\"%s\">%s </option>\n",stations.prin_aquifer,stations.prin_aquifer);
printf("<option value=\"UNKNOWN\">UNKNOWN</option>\n");
printf("<option value=\"N/A\">N/A</option>\n");

 for (i = 0; i < aquifer_one_count; i++)
   printf("<option value=\"%s\"> %s - %s </option>\n",aquifer_county[i].aquifer_cd,aquifer_county[i].aquifer_cd,aquifer_county[i].aquifer_nm);

printf("<option value=\"all\">SHOW ALL AQUIFERS </option></select>\n");
printf("<input type=\"button\" value=\"Test Aquifer\" onclick=\"validate5(form5,'aquifer')\">\n");
printf("</td></tr><tr><td colspan=\"3\" class=\"val\">Driller Name: &nbsp;\n");
printf("<select name=\"driller_nm\" onChange=\"drill(document.form3.driller_nm.options[selectedIndex].value);\">\n");

printf("<option selected value=\"%s\">%s </option>\n",stations.driller_nm,stations.driller_nm);
printf("<option value=\"UNKNOWN\">UNKNOWN</option>\n");
printf("<option value=\"N/A\">N/A</option>\n");

 for (i = 1; i < no_drillers; i++)
   printf("<option value=\"%s\"> %s </option>\n",cnst_driller[i].name,cnst_driller[i].name);

printf("<option value=\"all\">ADD NAME TO LIST</option></select></td>\n");






printf("</td></tr><tr><td colspan=\"2\" class=\"val\">\n");
printf("Date Well Drilled or Relift Installed: \n");
printf("<input type=\"text\" onFocus=\"this.select()\" name=\"date_drilled\"  class=\"formatme\" ");
printf("size=\"10\" value=\"%s\" maxlength=\"10\"></td>\n",stations.date_drilled);
printf("<td class=\"val\">Well Depth: &nbsp; \n <input type=\"text\" class=\"formatme\"  onFocus=\"this.select()\" value=\"%s\" name=\"well_depth\" size=\"4\" maxlength=\"4\"></td></tr>\n",stations.well_depth);
printf("<tr><th colspan=\"3\">Location of Withdrawal</th>\n");
printf("</tr><td class=\"reg\">County: &nbsp; \n");

 if ((strcmp(county_cd,"153")==0)||(strcmp(county_cd,"151")==0))
   {
    printf("<select name=\"county_cd\">\n");
    for (j=0; j < num_of_counties; j++ )
     {
      if (strcmp(stations.county_cd,county[j].county_cd) ==0)
   	printf("<option selected value=\"%s\">%s \n",county[j].county_cd, county[j].county_nm);
      else
   	printf("<option value=\"%s\">%s \n",county[j].county_cd, county[j].county_nm);

     }
    printf("</select>\n");
   }

else
  {
   printf("%s\n",county_nm);
   printf("<input type=\"hidden\" name=\"county_cd\" value=\"%s\">\n",stations.county_cd);
  }


printf("</td><td class=\"reg\">State: Arkansas &nbsp;\n");
printf("<input type=\"hidden\" name=\"state\" value=\"%s\">\n",stations.state_cd);
printf("</td><td class=\"val\">HUC: &nbsp; \n");
printf("<select name=\"huc\">\n");

if (strcmp(huc,"") == 0)
  printf(" <option value=\"%s\" selected>%s\n",stations.huc,stations.huc);
else
  printf(" <option value=\"%s\" selected>%s\n",huc,huc);

printf(" <option value=\"08010100\">08010100\n");
printf(" <option value=\"08020100\">08020100\n");
printf(" <option value=\"08020203\">08020203\n");
printf(" <option value=\"08020204\">08020204\n");
printf(" <option value=\"08020205\">08020205\n");
printf(" <option value=\"08020301\">08020301\n");
printf(" <option value=\"08020302\">08020302\n");
printf(" <option value=\"08020303\">08020303\n");
printf(" <option value=\"08020304\">08020304\n");
printf(" <option value=\"08020401\">08020401\n");
printf(" <option value=\"08020402\">08020402\n");
printf(" <option value=\"08030100\">08030100\n");
printf(" <option value=\"08040101\">08040101\n");
printf(" <option value=\"08040102\">08040102\n");
printf(" <option value=\"08040103\">08040103\n");
printf(" <option value=\"08040201\">08040201\n");
printf(" <option value=\"08040202\">08040202\n");
printf(" <option value=\"08040203\">08040203\n");
printf(" <option value=\"08040204\">08040204\n");
printf(" <option value=\"08040205\">08040205\n");
printf(" <option value=\"08040206\">08040206\n");
printf(" <option value=\"08040207\">08040207\n");
printf(" <option value=\"08050001\">08050001\n");
printf(" <option value=\"08050002\">08050002\n");
printf(" <option value=\"11010001\">11010001\n");
printf(" <option value=\"11010003\">11010003\n");
printf(" <option value=\"11010004\">11010004\n");
printf(" <option value=\"11010005\">11010005\n");
printf(" <option value=\"11010006\">11010006\n");
printf(" <option value=\"11010007\">11010007\n");
printf(" <option value=\"11010008\">11010008\n");
printf(" <option value=\"11010009\">11010009\n");
printf(" <option value=\"11010010\">11010010\n");
printf(" <option value=\"11010011\">11010011\n");
printf(" <option value=\"11010012\">11010012\n");
printf(" <option value=\"11010013\">11010013\n");
printf(" <option value=\"11010014\">11010014\n");
printf(" <option value=\"11070206\">11070206\n");
printf(" <option value=\"11070208\">11070208\n");
printf(" <option value=\"11070209\">11070209\n");
printf(" <option value=\"11110103\">11110103\n");
printf(" <option value=\"11110104\">11110104\n");
printf(" <option value=\"11110201\">11110201\n");
printf(" <option value=\"11110202\">11110202\n");
printf(" <option value=\"11110203\">11110203\n");
printf(" <option value=\"11110204\">11110204\n");
printf(" <option value=\"11110205\">11110205\n");
printf(" <option value=\"11110206\">11110206\n");
printf(" <option value=\"11110207\">11110207\n");
printf(" <option value=\"11140105\">11140105\n");
printf(" <option value=\"11140106\">11140106\n");
printf(" <option value=\"11140108\">11140108\n");
printf(" <option value=\"11140109\">11140109\n");
printf(" <option value=\"11140201\">11140201\n");
printf(" <option value=\"11140203\">11140203\n");
printf(" <option value=\"11140205\">11140205\n");
printf(" <option value=\"11140302\">11140302\n");
printf(" <option value=\"11140304\">11140304 </select>\n");	

printf("</tr><tr>\n");
printf("<td class=\"reg\"><div class=\"val\"><select name=\"quad1\"><option value=\"%s\" selected>%s\n",stations.quad1,stations.quad1);
printf(" <option value=\"SW\">SW\n");
printf(" <option value=\"SE\">SE\n");
printf(" <option value=\"NW\">NW\n");
printf(" <option value=\"NE\">NE\n");
printf("</select> &#188; of \n");
printf("<select name=\"quad2\">\n");
printf("<option value=\"%s\" selected>%s\n",stations.quad2,stations.quad2);
printf(" <option value=\"SW\">SW\n");
printf(" <option value=\"SE\">SE\n");
printf(" <option value=\"NW\">NW\n");
printf(" <option value=\"NE\">NE\n");
printf(" </select> &#188; <br></div>\n");

printf("</td><td class=\"reg\">\n");

if (strcmp(section,"")==0)
  printf("<div class=\"val\">Section <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"section\" size=\"2\" maxlength=\"2\" >\n",stations.section);
else
  printf("<div class=\"val\">Section <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"section\" size=\"2\" maxlength=\"2\" >\n",section);


if (strcmp(township,"")==0)
  printf("Township <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"township\" size=\"3\" maxlength=\"3\" >\n",stations.township);
else
  printf("Township <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"township\" size=\"3\" maxlength=\"3\" >\n",township);

printf("</td><td class=\"reg\">\n");

if (strcmp(range,"")==0)
  printf("<div class=\"val\">Range <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"range\" size=\"3\" maxlength=\"3\" >\n",stations.range);
else
  printf("<div class=\"val\">Range <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" value=\"%s\" name=\"range\" size=\"3\" maxlength=\"3\" >\n",range);

printf("</td></tr><tr><td class=\"val\">Latitude: &nbsp; \n");
printf("<input type=\"text\" class=\"formatme\" onFocus=this.select() value=\"%s\" size=\"6\" maxlength=\"6\" name=\"latitude\"></td>\n",stations.latitude);
printf("</td><td class=\"val\">Longitude: &nbsp;\n");
printf("<input type=\"text\" class=\"formatme\" onFocus=this.select() value=\"%s\" name=\"longitude\" size=\"7\" maxlength=\"7\">\n",stations.longitude);
printf("</td><td class=\"val\">Altitude: &nbsp;\n <input type=\"text\" class=\"formatme\" onFocus=\"this.select()\" ");
if (altitude !=0)
	printf("value=\"%.2f\" name=\"altitude\" size=\"8\"></td>\n",altitude);
else
	printf("value=\"%.2f\" name=\"altitude\" size=\"8\"></td>\n",stations.altitude);

printf("<tr><th colspan=\"3\">\n");
printf("<input type=\"button\" value=\"Map this Latitude and Longitude or Find New Point\" onClick=validate5(form5); >\n");
printf("</td></tr>\n");
printf("<tr><th colspan=\"3\">Pump Information</th>\n");

printf("</tr><tr><td class=\"val\">Pump Horsepower: &nbsp; <input class=\"formatme\" type=\"text\" onFocus=\"this.select();\" \n");
printf("value=\"%s\" name=\"pump_hp\" size=\"3\" maxlength=\"3\"></td>\n",stations.pump_hp);
printf("</td><td colspan=\"2\" class=\"val\">Discharge Pipe Diameter: &nbsp; \n");
printf("<input type=\"text\" onFocus=\"this.select();\" value=\"%s\" name=pipe_diam size=\"2\" class=\"formatme\" maxlength=\"2\"></td></tr>\n",stations.pipe_diam);

printf("<tr><td class=\"val\">Power Type: \n");
printf("<select name=\"power_tp\">\n");
printf("  <option value=\"%s\" selected>%s\n",stations.power_tp,stations.power_tp);
printf("  <option value=\"ELC\">ELC</option>\n");
printf("  <option value=\"LPG\">LPG</option>\n");
printf("  <option value=\"DSL\">DSL</option>\n");
printf("  <option value=\"OTH\">OTH</option>\n </select>\n");


printf("</td><td colspan=\"2\" class=\"val\">Diversion Method:\n");
printf("<select name=\"diversion_meth\">\n");
printf("  <option value=\"%s\" selected>%s</option>\n",stations.diversion_meth,stations.diversion_meth);
printf("  <option value=\"STP\">STP</option>\n");
printf("  <option value=\"PTP\">PTP</option>\n");
printf("  <option value=\"GRV\">GRV</option>\n");
printf("  <option value=\"OTH\">OTH \n</option></select>");

printf("</td></tr><tr><td class=\"val\">Flow Meter:\n");
printf("&nbsp; &nbsp; \n");

if ((strcmp(meter_flg,"Y") ==0) || (strcmp(meter_flg,"y") == 0))
  {
   printf("<input checked type=\"radio\" value=\"Y\" name=\"meter_flg\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input type=\"radio\" value=\"N\" name=\"meter_flg\">No\n");
  }
else
  {
   printf("<input type=\"radio\" value=\"Y\" name=\"meter_flg\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input checked type=\"radio\" value=\"N\" name=\"meter_flg\">No\n");
  }


printf("</td><td colspan=\"2\" class=\"val\">Reclaimed Waste:\n");
printf("&nbsp; &nbsp; \n");

if ((strcmp(stations.rec_waste,"Y") ==0) || (strcmp(stations.rec_waste,"y") == 0))
  {
   printf("<input checked type=\"radio\" value=\"Y\" name=\"rec_waste\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input type=\"radio\" value=\"N\" name=\"rec_waste\">No\n");
  }
else
  {
   printf("<input type=\"radio\" value=\"Y\" name=\"rec_waste\">Yes \n");
   printf("&nbsp; &nbsp; \n");
   printf("<input checked type=\"radio\" value=\"N\" name=\"rec_waste\">No\n");
  }

printf("<tr><td class=\"head_center\">\n");
printf("<input type=\"button\" value=\"Main Menu\" \n");
printf("onClick=window.location=\"%s/index.html\"></td>\n",pathfile);
printf("<td colspan=\"2\" class=\"head_center\"> \n");
printf("<input type=\"submit\" value=\"Update Measurement Point\">\n");
printf("</td></tr></table></form>\n");
printf("<p class=\"val\">Denotes Required Fields</p>\n");
printf("<p class=\"val\">(If the data for a required field is unknown or non applicable then use --)</p>\n");
printf("<form method=\"get\" name=\"form5\" action=\"%s/MAPS/general.phtml\">\n",pathfile);
printf("<input type=\"hidden\" name=\"owner_id\"    value=\"%d\">\n",stations.owner_id);
printf("<input type=\"hidden\" name=\"diverter_id\" value=\"%d\">\n",stations.diverter_id);
printf("<input type=\"hidden\" name=\"facility_id\" value=\"%d\">\n",stations.facility_id);
printf("<input type=\"hidden\" name=\"idtype\"	    value=\"%s\">\n",idtype);
printf("<input type=\"hidden\" name=\"mpid\"        value=\"%s\">\n",stations.mpid);
printf("<input type=\"hidden\" name=\"latitude\"    value=\"%s\">\n",stations.latitude);
printf("<input type=\"hidden\" name=\"longitude\"   value=\"%s\">\n",stations.longitude);
printf("<input type=\"hidden\" name=\"where\"       value=\"modify_mpid\">\n");
printf("<input type=\"hidden\" name=\"idtype\"      value=\"%s\">\n",idtype);
printf("<input type=\"hidden\" name=\"map_well_feature_points\" value=\"\">\n");
printf("<input type=\"hidden\" name=\"map_well_projection\" value=\"proj=latlong,datum=%s\">\n",datum);
printf("</form></center></body></html>\n");
 }
