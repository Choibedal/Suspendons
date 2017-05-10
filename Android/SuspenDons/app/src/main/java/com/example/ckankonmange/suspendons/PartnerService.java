package com.example.ckankonmange.suspendons;

import android.util.Log;

import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONObject;

import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;

/**
 * Created by Ckankonmange on 31/03/2017.
 */

public class PartnerService
{


    public StringBuilder getFromDatabase(String action)
    {
        final StringBuilder json = new StringBuilder();
        try
        {
            //Prod
            URL url = new URL("http://www.suspendons.fr/query.php");
            String urlParams = "action=" + action;

            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setDoOutput(true);
            OutputStream os = conn.getOutputStream();
            os.write(urlParams.getBytes());
            os.flush();
            os.close();


            InputStreamReader in = new InputStreamReader(conn.getInputStream());
            // Read the JSON data into the StringBuilder
            int read;
            char[] buff = new char[1024];
            while ((read = in.read(buff)) != -1)
            {
                json.append(buff, 0, read);
            }

            conn.disconnect();
        }
         catch (Exception e)
        {
            Log.e("Error", e.getMessage());
            e.printStackTrace();
            return null;
        }
        return json;
    }



    public StringBuilder retrievePartners()
    {
        return getFromDatabase("action=partners");
    }

    public PartnerAdModel getRandomPartnerAd()
    {
        final StringBuilder json = getFromDatabase("showAd");
        PartnerAdModel partnerAdModel = new PartnerAdModel();
        try
        {
            JSONObject jsonRoot = new JSONObject(json.toString());
            for (int i = 0; i < jsonRoot.length(); i++)
            {
                // Create a marker for each city in the JSON data.
                JSONObject jsonObj = jsonRoot.getJSONObject(String.valueOf(i));
                partnerAdModel.videoLink = jsonObj.getString("videoLink");

                partnerAdModel.partnerName = jsonObj.getString("partnerName");
                partnerAdModel.partnerLink = jsonObj.getString("partnerLink");
            }
        }
        catch (Exception e)
        {
            Log.e("Error", e.getMessage());
            e.printStackTrace();
            return null;
        }
        return partnerAdModel;
    }
}
