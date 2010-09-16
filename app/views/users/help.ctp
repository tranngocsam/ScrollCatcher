<div id="help_page">
  <table border="1">
    <tr>
      <td>
        Create scroll catcher script
      </td>
      <td>
        <ul>
          <li>Login to system</li>
          <li>Go to /scroll_catchers/edit</li>
          <li>Enter neccessary scroll catcher information:
            <ul>
              <li>
                <em>Name:</em> Name of the scroll catcher
              </li>
              <li>
                <em>Speed:</em> Maximum number of pixels that user scroll the window in 1 second. If the number of pixels that user scroll in one second exceeds this value, an alert box/dialogue/iframe will appear.
              </li>
              <li>
                <em>Distance:</em> The maximum number of pixels that user can scroll before an alert box/dialogue/iframe will appear.
              </li>
              <li>
                <em>Always monitor:</em> Whether the script monitors user scroll action every time or just the first time.
              </li>
              <li>
                <em>Type:</em> Type of the alert will apear if user scroll speed exceeds the specified speed or the distance that user scroll exceed the specified distance. This option has the following value:
                <ul>
                  <li>
                    Alert box: An alert box with content specify by the alert content option.
                  </li>
                  <li>
                    Dialogue: A dialogue with content load from url specify by the iframe_url option. The width and height of the dialogue are specified by the diaplogue width and dialogue height option.
                  </li>
                  <li>
                    Full page: A full screen iframe with content load from url specify by the iframe_url option.
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>Hit save button</li>
          <li>Wait for the page finish loading</li>
          <li>Scroll down the page, you will see the newly created catcher on the table</li>
          <li>Copy the url of the scroll catcher under catcher name</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td>
        Include scroll catcher script
      </td>
      <td>
        <ul>
          <li>Get the scroll catcher that you want to include</li>
          <li>Make sure to include jquery to your page that you want to monitor user scroll event</li>
          <li>Add a script tag to load the scroll catcher url to the page that you want to monitor user scroll event, after the jquery include script</li>
        </ul>
      </td>
    </tr>
  </table>
</div>
