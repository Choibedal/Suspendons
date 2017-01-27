package com.example.ckankonmange.suspendons;

import android.content.SharedPreferences;
import android.location.Address;
import android.location.Geocoder;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.util.Log;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback
{

    private GoogleMap mMap;
    private ArrayList<MarkerOptions> mMarkers;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        new Thread(new Runnable()
        {
            public void run()
            {
                try
                {
                    retrievePartners();
                } catch (IOException e)
                {
                    e.printStackTrace();
                    return;
                }
            }
        }).start();
    }


    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */
    @Override
    public void onMapReady(GoogleMap googleMap)
    {
        mMap = googleMap;

        //Set camera
        LatLng strasbourg = new LatLng(48.5697171,7.747501);
        CameraPosition cameraPosition = new CameraPosition.Builder()
                .target(strasbourg)     // Sets the center of the map to Mountain View
                .zoom(13)                   // Sets the zoom                // Sets the tilt of the camera to 30 degrees
                .build();                   // Creates a CameraPosition from the builder
        mMap.animateCamera(CameraUpdateFactory.newCameraPosition(cameraPosition));
    }

    protected void retrievePartners() throws IOException
    {
        final StringBuilder json = new StringBuilder();
        try
        {
            //Prod
            URL url = new URL("http://www.suspendons.fr/query.php");
            String urlParams = "action=partners";

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

            ArrayList<MarkerOptions> markers = new ArrayList<MarkerOptions>();

            JSONObject jsonRoot = new JSONObject(json.toString());
            for (int i = 0; i < jsonRoot.length(); i++)
            {
                // Create a marker for each city in the JSON data.
                JSONObject jsonObj = jsonRoot.getJSONObject(String.valueOf(i));
                String name = jsonObj.getString("name");
                String address = jsonObj.getString("address");

                //Transform address to LatLng
                LatLng position = getLocationFromAddress(address);

                //Place marker
                markers.add(new MarkerOptions()
                        .position(position)
                        .title(name + " " + address));
            }

            mMarkers = markers;

            // Create markers
            // Must run this on the UI thread since it's a UI operation.
            runOnUiThread(new Runnable()
            {
                public void run()
                {
                    try
                    {
                        createMarkers();
                    } catch (Exception e)
                    {
                        e.printStackTrace();
                    }
                }
            });


        } catch (Exception e)
        {
            //TODO Add toast message
            e.printStackTrace();
        }
    }

    void createMarkers() throws Exception
    {
        //Add partners
        for (int i = 0; i < mMarkers.size(); i++)
        {
            mMap.addMarker(mMarkers.get(i));
        }
    }

    public LatLng getLocationFromAddress(String strAddress)
    {
        LatLng position = new LatLng(0, 0);
        final StringBuilder json = new StringBuilder();
        int tmp;
        try
        {
            HttpURLConnection conn = null;
            StringBuilder jsonResults = new StringBuilder();
            String googleMapUrl = "http://maps.googleapis.com/maps/api/geocode/json?address="
                    + strAddress + "&sensor=false";

            URL url = new URL(googleMapUrl);
            conn = (HttpURLConnection) url.openConnection();
            InputStreamReader in = new InputStreamReader(
                    conn.getInputStream());
            int read;
            char[] buff = new char[1024];
            while ((read = in.read(buff)) != -1)
            {
                jsonResults.append(buff, 0, read);
            }
            String a = "";

            JSONObject JsonRoot = new JSONObject(jsonResults.toString());
            //JSONObject jsonObj = JsonRoot.getJSONObject("results").getJSONObject("geometry").getJSONObject("location");
            JSONArray jsonArr = JsonRoot.getJSONArray("results");
            JSONObject jsonObj = JsonRoot.getJSONArray("results").getJSONObject(0);
            jsonObj = JsonRoot.getJSONArray("results").getJSONObject(0).getJSONObject("geometry").getJSONObject("location");
            double lat = Double.parseDouble(jsonObj.getString("lat"));
            double lng = Double.parseDouble(jsonObj.getString("lng"));
            position = new LatLng(lat, lng);
        } catch (Exception e)
        {
            //TODO Add toast message
            e.printStackTrace();
        }

        return position;
    }


















    /*// Exemple

    private static final String LOG_TAG = "ExampleApp";

    private static final String SERVICE_URL = "http://www.suspendons.fr/query.php?action=partners";

    protected GoogleMap map;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        setUpMapIfNeeded();
    }

    @Override
    protected void onResume()
    {
        super.onResume();
        setUpMapIfNeeded();
    }

    private void setUpMapIfNeeded()
    {
        if (map == null)
        {
            map = ((SupportMapFragment) getSupportFragmentManager().findFragmentById(R.id.map))
                    .getMap();
            if (map != null)
            {
                setUpMap();
            }
        }
    }

    private void setUpMap()
    {
        // Retrieve the city data from the web service
        // In a worker thread since it's a network operation.
        new Thread(new Runnable()
        {
            public void run()
            {
                try
                {
                    retrieveAndAddCities();
                } catch (IOException e)
                {
                    Log.e(LOG_TAG, "Cannot retrive cities", e);
                    return;
                }
            }
        }).start();
    }

    protected void retrieveAndAddCities() throws IOException
    {
        HttpURLConnection conn = null;
        final StringBuilder json = new StringBuilder();
        try
        {
            // Connect to the web service
            URL url = new URL(SERVICE_URL);
            conn = (HttpURLConnection) url.openConnection();
            InputStreamReader in = new InputStreamReader(conn.getInputStream());

            // Read the JSON data into the StringBuilder
            int read;
            char[] buff = new char[1024];
            while ((read = in.read(buff)) != -1)
            {
                json.append(buff, 0, read);
            }
        } catch (IOException e)
        {
            Log.e(LOG_TAG, "Error connecting to service", e);
            throw new IOException("Error connecting to service", e);
        } finally
        {
            if (conn != null)
            {
                conn.disconnect();
            }
        }

        // Create markers for the city data.
        // Must run this on the UI thread since it's a UI operation.
        runOnUiThread(new Runnable()
        {
            public void run()
            {
                try
                {
                    createMarkersFromJson(json.toString());
                } catch (JSONException e)
                {
                    Log.e(LOG_TAG, "Error processing JSON", e);
                }
            }
        });
    }*/


}
