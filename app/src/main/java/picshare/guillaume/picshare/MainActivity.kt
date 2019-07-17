package picshare.guillaume.picshare

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.support.v7.widget.LinearLayoutManager
import android.support.v7.widget.RecyclerView
import kotlinx.android.synthetic.main.activity_main.*
import picshare.guillaume.picshare.Adapters.MainRecyclerView

class MainActivity : AppCompatActivity() {

    private lateinit var recyclerView: MainRecyclerView
    private lateinit var viewAdapter: RecyclerView.Adapter<*>
    private lateinit var viewManager: RecyclerView.LayoutManager

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)


        val myDataset: Array<String> = arrayOf("Lithuanie", "Guatemala", "Japon", "France", "Guadeloupe", "Danemark")


        viewManager = RecyclerView(this)
        viewAdapter = MainRecyclerView(myDataset)

        recyclerView = findViewById<RecyclerView>(R.id.activity_main_recyclerview).apply {
            // use this setting to improve performance if you know that changes
            // in content do not change the layout size of the RecyclerView
            setHasFixedSize(true)

            // use a linear layout manager
            layoutManager = viewManager

            // specify an viewAdapter (see also next example)
            adapter = viewAdapter

        }

        activity_main_go_to_login.setOnClickListener {
            val intent = Intent(this@MainActivity, LoginActivity::class.java)
            startActivity(intent)
        }

        //activity_main_recyclerview


    }
}
