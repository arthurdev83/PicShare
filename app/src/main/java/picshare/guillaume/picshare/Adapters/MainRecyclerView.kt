package picshare.guillaume.picshare.Adapters

import android.support.v7.widget.RecyclerView
import android.support.v7.widget.CardView
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.LinearLayout
import android.widget.TextView
import picshare.guillaume.picshare.R

class MainRecyclerView(private val myDataset: Array<String>) :
    RecyclerView.Adapter<MainRecyclerView.ViewHolder>() {

    // Provide a reference to the views for each data item
    // Complex data items may need more than one view per item, and
    // you provide access to all the views for a data item in a view holder.
    // Each data item is just a string in this case that is shown in a TextView.
    inner class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {

        val cardView = itemView.findViewById(R.id.card_view) as CardView
        val item_title = cardView.findViewById(R.id.item_main_title) as TextView

    }


    // Create new views (invoked by the layout manager)
    override fun onCreateViewHolder(parent: ViewGroup,
                                    viewType: Int): ViewHolder {
        // create a new view
        val viewItem = LayoutInflater.from(parent.context)
            .inflate(R.layout.item_main, parent, false)
        // set the view's size, margins, paddings and layout parameters
        return ViewHolder(viewItem)

    }

    // Replace the contents of a view (invoked by the layout manager)
    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        // - get element from your dataset at this position
        // - replace the contents of the view with that element
        holder.item_title.text = myDataset[position]
    }

    // Return the size of your dataset (invoked by the layout manager)
    override fun getItemCount() = myDataset.size
}


/*
[
	{
		"place_address": "4599 Ultrices Rd.",
		"place_country": "Cameroon",
		"place_lat_lng": "36.57767, -12.43593"
	},
	{
		"place_address": "Ap #586-2263 Dapibus Rd.",
		"place_country": "Saint Barthélemy",
		"place_lat_lng": "-28.15993, 143.16245"
	},
	{
		"place_address": "Ap #414-751 Aliquam St.",
		"place_country": "Madagascar",
		"place_lat_lng": "-35.53176, -114.48535"
	},
	{
		"place_address": "9812 Auctor Avenue",
		"place_country": "Mayotte",
		"place_lat_lng": "-74.29232, 175.93295"
	},
	{
		"place_address": "276-5370 Enim. St.",
		"place_country": "Isle of Man",
		"place_lat_lng": "-16.96024, 125.31975"
	},
	{
		"place_address": "504-3619 Aliquet, St.",
		"place_country": "Canada",
		"place_lat_lng": "63.07936, 6.44094"
	},
	{
		"place_address": "7413 Justo. St.",
		"place_country": "Malaysia",
		"place_lat_lng": "-72.35724, 146.06175"
	},
	{
		"place_address": "Ap #335-2328 Mauris Ave",
		"place_country": "Tonga",
		"place_lat_lng": "41.34631, -29.47401"
	},
	{
		"place_address": "634-5863 Orci Rd.",
		"place_country": "French Polynesia",
		"place_lat_lng": "-27.04391, -101.72981"
	},
	{
		"place_address": "804 Est Rd.",
		"place_country": "Gibraltar",
		"place_lat_lng": "-11.63618, 176.28791"
	},
	{
		"place_address": "P.O. Box 679, 1645 Id Rd.",
		"place_country": "Cuba",
		"place_lat_lng": "25.35709, -2.29843"
	},
	{
		"place_address": "Ap #524-4045 Sem Ave",
		"place_country": "Norway",
		"place_lat_lng": "-59.13663, 157.41298"
	},
	{
		"place_address": "Ap #372-1895 Consectetuer St.",
		"place_country": "Mauritania",
		"place_lat_lng": "-37.03083, 114.21738"
	},
	{
		"place_address": "P.O. Box 405, 2347 Tincidunt. Avenue",
		"place_country": "Venezuela",
		"place_lat_lng": "76.39713, -8.4206"
	},
	{
		"place_address": "Ap #364-4742 Nam St.",
		"place_country": "Cyprus",
		"place_lat_lng": "-49.33155, 158.23565"
	}
]
 */