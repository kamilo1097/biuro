using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Budowlanav2.Helpers
{
    public static class CheckbxHelper
    {
        public static MvcHtmlString MyCheckBox(this HtmlHelper helper, string variable)
        {
            string str = variable;
            string chbox = "<input type=\"checkbox\" id=\"" + str + "\" name=\"" + str + "\" value=\"true\" />";
            return new MvcHtmlString(chbox);
        }
    }
}